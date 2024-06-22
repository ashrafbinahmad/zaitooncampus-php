<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../lib/head.php'; ?>
    <title>Zaitoon Campus | Higher Secondary</title>

    <link rel="stylesheet" href="../styles/course_description.css?version=3">


</head>

<body>
    <?php include '../components/navbar.php'; ?>

    <div id="course-description"></div>

    <?php include '../components/footer.php'; ?>

    <script type="text/babel" src="../components/CourseDescription_dynamic.js"></script>
    <script type="text/babel">
        const urlParams = new URLSearchParams(window.location.search);
        const _courseName = urlParams.get('course');
        console.log(_courseName)
        const data = {
            desc: [
                {
                    title: "",
                    text: ""
                },
                {
                    title: null,
                    text: "Quality higher secondary education along with entrance coaching and Islamic studies, is a rare combination that is offered nowhere else in the country. In separate campuses for boys and girls, Zaitoon offers HS education as follows:"
                },
            ],
            features: [
                {
                    title: "Plus 1 Science",
                    desc: [
                        "With NEET/JEE, MED/ENGG entrance coaching ",
                        "The faculty members are well experienced trainers from professional coaching centres",
                    ]
                },
                {
                    title: "Plus 1 Commerce",
                    desc: [
                        "With CA/CMA foundation coaching",
                        "The faculty members are successful entrepreneurs of Business Administration"
                    ]
                },
                {
                    title: "Plus 1 Humanities",
                    desc: [
                        "Civil Service foundation coaching",
                        "CUET coaching and entrance coaching for premier institutes like JMI, TISS, APU, DU, HCU, EFLU, etc.",
                        "The faculty members are research scholars from national universities",
                    ]
                },
            ],
            end_desc: [
                {
                    title: "Along with Islamic Studies",
                    text: "With its firm foundations cemented by Islamic principles, Zaitoon also offers a religiously designed and constantly reviewed multidisciplinary curriculum of Islamic subjects including Islamic jurisprudence, Hadith, Quranic exegeses, spiritual and character education, etc with famous scholars graduated from renowned Islamic institutions of India as faculty."
                },
                {
                    title: null,
                    text: null
                }
            ],
        }

        class CourseDynamic extends React.Component {
            constructor(props) {
                super(props);
                this.state = {
                    fetchedData: [],
                }
            }
            setFetchedData = (data) => {
                this.setState({ fetchedData: data })
            }

            componentDidMount() {
                getAllData('courses').then((querySnapShot) => {
                    let data = querySnapShot.docs.map((doc) => {
                        return { ...doc.data(), id: doc.id };
                    }
                    );
                    let filtered_data = data.filter((item) => item.campus === "Boys").filter((item) => item.url.toLowerCase() === _courseName)
                    console.log(filtered_data[0] || "No data found")
                    filtered_data[0] || console.log("full data", data)
                    this.setFetchedData(filtered_data[0]);

                    // redirect to girls page

                    if (filtered_data[0].campus === "Girls") window.location = "/girls-campus/?course=" + _courseName


                })
            }
            render() {
                return (
                    <div>
                        {
                            this.state.fetchedData.campus != "Girls" &&
                            <CourseDescription
                                courseName={this.state.fetchedData?.courseName}
                                data={this.state.fetchedData}
                                same_courses={["SCIENCE: Bio-Math & Computer Science", "COMMERCE: Computer Application"]}
                                same_courses_with_link={[{
                                    name: "SCIENCE",
                                    link: "/boys-campus/?course=science__bio_math___computer_science"
                                },
                                {
                                    name: "COMMERCE",
                                    link: "/boys-campus/?course=commerce__computer_application"
                                }]
                                }
                            />
                        }
                    </div>
                )
            }

        }

        const root = ReactDOM.createRoot(document.getElementById('course-description'))
        root.render(<CourseDynamic />)
    </script>



</body>

</html>