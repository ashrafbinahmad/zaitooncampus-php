<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <?php include '../../lib/admin_layout.php'; ?>

    <div id="counts"></div>


    <script type="text/babel">


        class Overview extends React.Component {
            constructor(props) {
                super(props);
                this.state = {
                    campusCount: 0,
                    studentCount: 0,
                    teacherCount: 0,
                    courseCount: 0,
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
                    console.log(data)
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
                const onSubmit = (e) => {
                    e.preventDefault();
                    const data = {
                        campusCount: this.state.campusCount,
                        studentCount: this.state.studentCount,
                        teacherCount: this.state.teacherCount,
                        courseCount: this.state.courseCount
                    }
                    writeDataWithId('counts', '0', data)
                }
                return (
                    <div className='main' >

                        <div className='container'>





                            <h2>Counts to be shown in overview</h2>
                            <hr />
                            <form action="">
                                <label htmlFor="">Campuses count</label>
                                <input type="text" name="" id="" placeholder='Campuses count' value={this.state.campusCount} onChange={(e) => {
                                    this.setCampusCount(e.target.value);
                                }} />

                                <label htmlFor="">Students count</label>
                                <input type="text" name="" id="" placeholder='Students count' value={this.state.studentCount} onChange={(e) => {
                                    this.setStudentCount(e.target.value);
                                }} />
                                <label htmlFor="">Teachers count</label>
                                <input type="text" name="" id="" placeholder='Teachers count' value={this.state.teacherCount} onChange={(e) => {
                                    this.setTeacherCount(e.target.value);
                                }} />
                                <label htmlFor="">Courses count</label>
                                <input type="text" name="" id="" placeholder='Courses count' value={this.state.courseCount} onChange={(e) => {
                                    this.setCourseCount(e.target.value);
                                }} />
                                <input type="submit" value="Submit" onClick={onSubmit} />
                            </form>
                        </div>
                    </div>
                );
            }
        }

        const root = ReactDOM.createRoot(document.getElementById('counts'))
        root.render(<Overview />)
    </script>
</body>

</html>