<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizAttempt;

class JelajahController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function scan()
    {
        return view('pages.scan');
    }

    public function learning()
    {
        return view('pages.learning');
    }

    public function quiz()
    {
        $history = QuizAttempt::latest()->take(10)->get();

        return view('pages.quiz', compact('history'));
    }

    public function submitQuiz(Request $request)
    {
        $answers = [
            'q1' => 'b',
            'q2' => 'a',
            'q3' => 'c',
            'q4' => 'b',
            'q5' => 'a',
        ];

        $validated = $request->validate([
            'q1' => 'required|in:a,b,c',
            'q2' => 'required|in:a,b,c',
            'q3' => 'required|in:a,b,c',
            'q4' => 'required|in:a,b,c',
            'q5' => 'required|in:a,b,c',
        ]);

        $score = 0;

        foreach ($answers as $question => $correctAnswer) {
            if ($validated[$question] === $correctAnswer) {
                $score += 20;
            }
        }

        QuizAttempt::create([
            'session_id' => $request->session()->getId(),
            'user_id' => null,
            'score' => $score,
            'total_questions' => 5,
            'answers' => $validated,
        ]);

        return redirect()->route('quiz')
            ->with('score', $score);
    }
}
