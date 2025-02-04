<?php

namespace App\Http\Controllers;

use PhpOffice\PhpWord\TemplateProcessor;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Avurnav;
use Illuminate\Support\Facades\Storage;

class AvurnavExportController extends Controller
{
    public function exportPdf($id)
    {
        // Récupérer les données depuis la base de données
        $avurnav = Avurnav::find($id);

        if (!$avurnav) {
            return response()->json(['error' => "Données non trouvées pour l'ID: $id"], 404);
        }

        // Vérifier que le fichier Word existe
        $templatePath = storage_path('app/templates/11.FORMAT_AVURNAV_LOCAL.docx');
        if (!file_exists($templatePath)) {
            return response()->json(['error' => "Fichier introuvable : $templatePath"], 404);
        }

        // Charger le modèle Word
        $templateProcessor = new TemplateProcessor($templatePath);

        // Remplacer les champs du document avec les données de la base
        $templateProcessor->setValue('avurnav_local', $avurnav->avurnav_local);
        $templateProcessor->setValue('ile', $avurnav->ile);
        $templateProcessor->setValue('vous_signale', $avurnav->vous_signale);
        $templateProcessor->setValue('position', $avurnav->position);
        $templateProcessor->setValue('navire', $avurnav->navire);
        $templateProcessor->setValue('pob', $avurnav->pob);
        $templateProcessor->setValue('type', $avurnav->type);
        $templateProcessor->setValue('caracteristiques', $avurnav->caracteristiques);
        $templateProcessor->setValue('zone', $avurnav->zone);
        $templateProcessor->setValue('derniere_communication', $avurnav->derniere_communication);
        $templateProcessor->setValue('contacts', $avurnav->contacts);

        // Sauvegarder temporairement le fichier Word modifié
        $wordFilePath = storage_path('app/avurnav_output.docx');
        $templateProcessor->saveAs($wordFilePath);

        // Convertir le fichier Word en PDF avec LibreOffice (meilleure conversion)
        $pdfFilePath = storage_path('app/avurnav_output.pdf');
        $command = "soffice --headless --convert-to pdf --outdir " . storage_path('app') . " " . escapeshellarg($wordFilePath);
        shell_exec($command);

        // Vérifier si le fichier PDF a bien été créé
        if (!file_exists($pdfFilePath)) {
            return response()->json(['error' => "Erreur lors de la conversion en PDF."], 500);
        }

        // Télécharger le fichier PDF
        return response()->download($pdfFilePath)->deleteFileAfterSend(true);
    }
}
