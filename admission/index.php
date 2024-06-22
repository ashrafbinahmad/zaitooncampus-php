<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../lib/head.php'; ?>

    <link rel="stylesheet" href="../styles/description.css?version=3">
    <link rel="stylesheet" href="../styles/admission.css?v=4">


    <title>Zaitoon Campus | Admission</title>

</head>

<body>
    <?php include '../components/navbar.php'; ?>

    <div id="admission"></div>
    <?php include '../components/footer.php'; ?>



    <script type="text/babel">

        class Description extends React.Component {
            heading = `How  admission \n works?`
            learnMore = { text: 'Apply now', link: 'https://forms.gle/utgEHQoMFJYQVesZA' }
            desc = `Zaitoon adopts a strict and firm policy of ‘Screen and Select’. Under no circumstances does a candidate gain admission without written application and the subsequent screening which includes both written and face-to-face interviews. If one aces the first round of written test one will be called for the second round of face-to-face talk on a later date. If, unfortunately, one falls at the first hurdle of written interview the application will not proceed to the second round. \n
            Only those candidates who get through both the rounds are eventually offered a place at the campuses.`
            router = {
                route: window.location.pathname,
                push: (route) => {
                    window.location = route
                }
            }

            render() {
                return (
                    <section className='admission' style={{ minHeight: '70vh' }}   >
                        <header>
                            <div class="slideshow">
                                <img src="../assets/images/zigs_kottakkal.webp" class="slide_1"></img>
                                <img src="../assets/images/zibs_pattambi.webp" class="slide_2"></img>
                                <img src="../assets/images/zigs_payyannur.webp" class="slide_3"></img>
                            </div>
                            <div class="heading_and_btn">
                                <h1>{IS_ADMISSION_OPEN ? "Admissions Open" : "Admissions Closed"}</h1>
                                {IS_ADMISSION_OPEN ? <a href={ADMISSION_APPLICATION_LINK}  target="_blank"><button>APPLY NOW</button></a>  : ""}
                            </div>
                        </header>
                        <article>
                            <h2>Admission Procedure</h2>
                            <p> At Zaitoon, the admission process adheres to a rigorous <b>'Screen and Select'</b>  policy. Candidates
                                are expected to submit a written application and undergo thorough screening, encompassing
                                both written and face-to-face interviews. Success in the initial written test results in an
                                invitation for a subsequent face-to-face interview. Admission is granted exclusively to
                                candidates who successfully navigate through both rounds of evaluation</p>
                            <h3>Eligibility</h3>
                            <p>Prospective students should be eligible for admission to the grade they are seeking.
                                For example, to secure admission in Grade 8, the student must have successfully
                                completed Grade 7 in the previous school.</p>
                            <h3> Connecting with Respective Campuses</h3>
                            <ul>
                                <li>Applicants are encouraged to connect with the respective campus of Zaitoon where
                                    they are seeking admission.</li>
                                <li>For admission in Zaitoon International Girls Campus, Pang-Chendi, Kottakkal,
                                    Malappuram: <a href="tel:+91 7510 22 8881">+91 7510 22 8881</a> </li>
                                <li>For admission in Zaitoon International Boys Campus, Kaipuram, Palakkad : <a href="tel:+91 7510 22 8882">+91 7510 22 8882</a> </li>
                                <li>For admission in Zaitoon International Girls Campus, Cheemeni, Payyannur,
                                    Kannur: <a href="tel:+91 7510 22 8881">+91 7510 22 8881</a> </li>
                            </ul>
                            <h3>Application Process</h3>
                            <ul>
                                <li>The admission application form is available on our website. And will be availed on
                                    request as well.</li>
                                <li>The application process begins in November last week every year.</li>
                                <li>The admission process will start in December every year.</li>
                                <li>Candidates seeking admission should connect with the office for the details and
                                    register for the admission test.</li>
                            </ul>
                            <h3>Zaitoon Admission Test (ZAT)</h3>
                            <ul>
                                <li>Zaitoon follows a strict 'Screen and Select' policy and conducts a common admission test
                                    named ZAT (Zaitoon Admission Test).</li>
                                <li>ZAT is conducted multiple times, and students seeking admission should register and attend
                                    the in-campus entrance test.</li>
                                <li>In unavoidable circumstances, where on-campus testing is not feasible, an online test may be
                                    conducted. But Zaitoon cannot guarantee online testing availability</li>
                                <li>Admission is granted only after a written application and subsequent screening, including
                                    both written and face-to-face interviews.</li>
                                <li>Candidates who pass both rounds are eventually offered a place at the campuses.</li>
                            </ul>
                        </article>
                    </section>
                );
            }
        }

        const root = ReactDOM.createRoot(document.getElementById('admission'))
        root.render(<Description />)
    </script>
</body>

</html>