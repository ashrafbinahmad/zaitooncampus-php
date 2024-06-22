<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="notification.css">
    <style>
        .notifications {
            background: var(--primary-color);
            color: white;
            padding: 1rem;
            text-align: center;
            text-decoration: underline;
            position: relative;
            z-index: 20;
            /* background: linear-gradient(to right, white, transparent 50%); */
            /* -webkit-text-fill-color: transparent; */
            overflow: hidden;
        }

        .notifications::before {
            content: '';
            position: absolute;
            top: 0;
            /* left: 0; */
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, transparent 10%, rgba(255, 255, 255, 0.2), transparent 88%);
            /* background: blue; */
            z-index: 10;
            /* animation: shine 2.5s 1; */
            animation: shine 2.5s infinite ease-in-out;
        
        }

        @keyframes shine {
            0% {
                left: -10%;
            }

            100% {
                left: 110%
            }
        }
    </style>
</head>
<div class="notifications">
    <a download="AL FATHIH FINAL RESULT.pdf" href="/downloads/al-fathih-final-results.pdf">Al Fathih Scholarship Exam
        2024 Results are published.</a>
</div>

</html>