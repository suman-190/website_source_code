<?php
namespace App\Imports;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class QuestionsImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            // Skip the header row
            if ($index === 0) {
                continue;
            }

            // Ensure the row has enough columns
            if (count($row) < 8) {
                continue;
            }

            DB::transaction(function () use ($row) {
                // Create and save the Question instance
                $question = Question::create([
                    'question_title' => $row[1],  // Index matches column position in the Excel file
                    'question_type' => $row[2],
                    'correct_answer' => $row[3],
                    'exam_set_id' => $row[4],
                ]);

                // Create and save the associated answers
                for ($i = 0; $i <= 3; $i++) {
                    Answer::create([
                        'answer_title' => $row[5 + $i], // Options start from column 5
                        'answer_index' => $i,
                        'question_id' => $question->id,
                    ]);
                }
            });
        }
    }
}

