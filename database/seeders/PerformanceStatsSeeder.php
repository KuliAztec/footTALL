<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PerformanceStatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path ke file CSV
        $filePath = storage_path('app/csv/Mentah Cleaned(Data).csv');
        if (!file_exists($filePath)) {
            echo "File not found: $filePath\n";
            return;
        }

        // Buka file CSV
        $file = fopen($filePath, 'r');
        if ($file === false) {
            echo "Failed to open file: $filePath\n";
            return;
        }

        // Lewati baris header
        $header = fgetcsv($file);
        if ($header === false) {
            echo "Failed to read header from CSV file\n";
            fclose($file);
            return;
        }

        // Loop setiap baris
        while (($row = fgetcsv($file)) !== false) {
            if (count($row) < 116) { // Adjust the number based on the expected columns
                echo "Invalid row data: " . implode(',', $row) . "\n";
                continue;
            }

            DB::table('performance_stats')->updateOrInsert(
                ['uid' => $row[0]], // Condition to check if the record exists
                [
                    'uid' => $row[0],                // Added 'uid' column
                    'name' => $row[1],               // Adjusted indices
                    'position' => $row[2],
                    'age' => $row[3],
                    'height' => $row[4],
                    'weight' => $row[5],
                    'club' => $row[6],
                    'nationality' => $row[7],
                    'preferred_foot' => $row[14],
                    'apps' => $row[41],
                    'minutes' => $row[27],
                    'subs' => $row[42],
                    'goals' => $row[17],
                    'xG' => $row[16],
                    'shots' => $row[55],
                    'assists' => $row[40],
                    'xA' => $row[35],
                    'key_passes' => $row[85],
                    'progressive_passes' => $row[61],
                    'tackles_completed' => $row[45],
                    'interceptions' => $row[88],
                    'clearances' => $row[109],
                    'blocks' => $row[113],
                    'possession_won_per_90' => $row[66],
                    'possession_lost_per_90' => $row[67],
                    'clean_sheets' => $row[37],
                    'goals_conceded' => $row[29],
                    'total_distance' => $row[101],
                    'headers_won_per_90' => $row[91],
                    'headers_lost_per_90' => $row[93],
                    'aerial_duels_per_90' => $row[115],
                    'yellow_cards' => $row[15],
                    'red_cards' => $row[19],
                    'fouls' => $row[30],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        // Tutup file
        fclose($file);
    }
}
