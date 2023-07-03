<?php

namespace App\Jobs;

use App\Mail\PostMail;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ProcessSendingEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Post $post;

    /**
     * Create a new job instance.
     */
    public function __construct($post)
    {
        //
        $this->post = $post;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        $email = new PostMail($this->post);
        $website = $this->post->website();
        $users = $website->users();

        foreach ($users as $user) {
            Mail::to($user['email'])->send($email);
        }
    }
}
