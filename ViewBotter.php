<?php
class ProfileViewer {
    private int $counter = 0;

    public function view_profile(string $url): void
    {
        $url = trim($url);
        file_get_contents($url);
        $this->counter++;

        echo "\033[1mGitHub view counter: \033[32m+" . $this->counter . "\033[0m\n";
    }

    public function get_counter(): int
    {
        return $this->counter;
    }
}

$profile_viewer = new ProfileViewer();

echo 'Enter your GitHub views counter URL: ';
$url = trim(fgets(STDIN));

echo 'Enter the amount of views you want: ';
$views = trim(fgets(STDIN));

$timer_start = microtime(true);
for ($i = 0; $i < $views; $i++) {
    $profile_viewer->view_profile($url);
}
$timer_stop = microtime(true);

$time_elapsed = $timer_stop - $timer_start;

echo "Completed boosting in \033[32m$time_elapsed\033[0ms! Your github account has now an extra \033[32m$views\033[0m Views!";

?>