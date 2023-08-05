# TaskTool Timer
 Old project written in PHP and Bootstrap.

 # How it works

 * Starts a timestamped incremental timer that counts to 15 minutes.
 * At 15 minutes, enter in what you were working on (or accept the most recent entry).
 * Select whether or not the task was your focus, or a distraction.
 * Timer continues to increment in the background.
 * Saving your answer finishes the timestamp, calculates total time spent between intervals, and writes it to a sqlite log.
 * The timer starts again.

# How to Use
* Add to php enabled webserver. Make sure .sqlite file is writable.

# Why?
 The idea was to capture interruptions as they occur throughout the day. The tool proved valuable on several occasions where it was able to capture a disproprotionate amount of "Walk ups" on our Help Desk.
