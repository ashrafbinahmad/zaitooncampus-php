<!DOCTYPE html>
<html lang="en">

<body>
    <div id="overview"></div>


    <script type="text/babel">


        class Overview extends React.Component {
            constructor(props) {
                super(props);
                this.state = {
                    campusCount: "3",
                    studentCount: "1600+",
                    teacherCount: "130+",
                    courseCount: "6+",
                }
            }
            setCampusCount = (count) => {
                this.setState({ campusCount: count });
            }
            setStudentCount = (count) => {
                this.setState({ studentCount: count });
            }
            setTeacherCount = (count) => {
                this.setState({ teacherCount: count });
            }
            setCourseCount = (count) => {
                this.setState({ courseCount: count });
            }
            componentDidMount() {
                getAllData('counts').then((querySnapShot) => {
                    const data = querySnapShot.docs.map((doc) => {
                        return { ...doc.data(), id: doc.id };

                    }
                    );
                    this.setCampusCount(data[0].campusCount)
                    this.setStudentCount(data[0].studentCount)
                    this.setTeacherCount(data[0].teacherCount)
                    this.setCourseCount(data[0].courseCount)

                })
            }

            // campusCount = 0;
            // studentCount = 0;
            // teacherCount = 0;
            // courseCount = 0;


            render() {
                let data = [
                    {
                        title: 'CAMPUSES',
                        count: this.state.campusCount,
                        icon: <i class="fa-sharp fa-solid fa-school"></i>,
                    },
                    {
                        title: 'STUDENTS',
                        count: this.state.studentCount,
                        icon: <i class="fa-sharp fa-solid fa-children"></i>,
                    },
                    {
                        title: 'TEACHERS',
                        count: this.state.teacherCount,
                        icon: <i class="fa-solid fa-chalkboard-user"></i>,
                    },
                    {
                        title: 'COURSES',
                        count: this.state.courseCount,
                        icon: <i class="fa-sharp fa-solid fa-graduation-cap"></i>,
                    },
                ]
                return (
                    <div className='overview' >
                        <ul>
                            {
                                data.map((item, index) => (
                                    <li key={index}>
                                        <h1>{item.count}</h1>
                                        <h2>
                                             {item.icon}
                                            {item.title}</h2>
                                    </li>
                                ))
                            }
                        </ul>
                    </div>
                );
            }
        }

        const root = ReactDOM.createRoot(document.getElementById('overview'))
        root.render(<Overview />)
    </script>
</body>

</html>