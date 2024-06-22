<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <?php include '../../lib/admin_layout.php'; ?>

    <div id="news_events"></div>


    <script type="text/babel">


        class Overview extends React.Component {

            // const[headline, setHeadline] = useState('');
            // const[content, setContent] = useState('');
            // const[date, setDate] = useState('');
            // const[image, setImage] = useState({ value: '' });
            // const[uploadProgress, setUploadProgress] = useState(0);
            // const[submitId, setSubmitId] = useState(0);

            // const[editMode, setEditMode] = useState(false);
            // const[editId, setEditId] = useState('');
            constructor(props) {
                super(props);
                this.state = {
                    fetchedData: [],
                    headline: '',
                    welcome: "",
                    content: '',
                    date: '',
                    image: { value: '' },
                    uploadProgress: 0,
                    yt: '',

                    features: [{
                        heading: '',
                        content: '',
                    }],
                    campus: "Boys",
                    
                    submitId: 0,
                    editMode: false,
                    editId: '',
                    courseName: '',

                }
            }
            setFetchedData = (data) => {
                this.setState({ fetchedData: data })
            }
            setHeadline = (data) => {
                this.setState({ headline: data })
            }
            setContent = (data) => {
                this.setState({ content: data })
            }
            setWelcome = (data) => {
                this.setState({ welcome: data })
            }
            setDate = (data) => {
                this.setState({ date: data })
            }
            setImage = (data) => {
                this.setState({ image: data })
            }
            setUploadProgress = (data) => {
                this.setState({ uploadProgress: data })
            }
            setSubmitId = (data) => {
                this.setState({ submitId: data })
            }
            setEditMode = (data) => {
                this.setState({ editMode: data })
            }
            setEditId = (data) => {
                this.setState({ editId: data })
            }
            setFeatures = (data) => {
                this.setState({ features: data })
            }
            setCampus = (data) => {
                this.setState({ campus: data })
            }
            setCourseName = (data) => {
                this.setState({ courseName: data })
            }
            setYt = (data) => {
                this.setState({ yt: data })
            }

            loadData() {
                getAllData('courses').then((querySnapShot) => {
                    const data = querySnapShot.docs.map((doc) => {
                        return { ...doc.data(), id: doc.id };

                    }
                    );
                    //console.log(data)
                    this.setFetchedData(data.reverse());

                })
            }
            componentDidMount() {
                // if (this.state.submitId != prev.submitId) {
                // alert('componentDidUpdate  submitId')
                this.loadData()
                // }
            }


            render() {
                const clearForm = () => {
                    this.setHeadline('');
                    this.setContent('');
                    this.setWelcome('');
                    this.setDate('');
                    this.setImage({ value: '' });
                    this.setEditMode(false);
                    this.setEditId('');
                    this.setCourseName('')
                    this.setYt('')
                    this.setFeatures([{
                        heading: '',
                        content: '',
                    }])
                }

                const onSubmit = async (e) => {


                    e.preventDefault();
                    const id = this.state.editMode ? this.state.editId : getRandomId();
                    if (!this.state.courseName || !this.state.content || !this.state.features || !this.state.campus) {
                        console.log({ courseName: this.state.courseName, content: this.state.content, welcome: this.state.welcome, features: this.state.features, campus: this.state.campus })
                        toast.error('Please fill all the fields');
                        return;
                    }


                    if (this.state.editMode) {
                        const data = {
                            courseName: this.state.courseName,
                            content: this.state.content,
                            welcome: this.state.welcome,
                            features: this.state.features,
                            campus: this.state.campus,
                            yt: this.state.yt,
                            url: this.state.courseName.replace(/[^a-z0-9]/gmi, "_").toLowerCase()
                        }
                        updateData('courses', id, data).then(() => {
                            clearForm()
                            this.loadData()
                            this.setSubmitId(this.state.submitId + 1);
                        })
                    }
                    else {
                        const data = {
                            courseName: this.state.courseName,
                            content: this.state.content,
                            welcome: this.state.welcome,
                            features: this.state.features,
                            yt: this.state.yt,
                            campus: this.state.campus,
                            url: this.state.courseName.replace(/[^a-z0-9]/gmi, "-").toLowerCase()
                        }
                        writeDataWithId('courses', id, data).then(() => {
                            clearForm()
                            this.loadData()
                            this.setSubmitId(this.state.submitId + 1);

                        })
                    }
                    ;


                }



                return (
                    <div className='main' >
                        <div className='container'>
                            <div data-type="dualspace">
                                <div>
                                    <h2>All news and events</h2>
                                    <hr />
                                    {
                                        this.state.fetchedData.map((item, index) => {
                                            return (
                                                <div key={index} data-type='card'>
                                                    <div data-type='controllers'>
                                                        <span onClick={() => {
                                                            deleteData('courses', item.id).then(() => {
                                                                this.loadData()
                                                                this.setSubmitId(submitId + 1);
                                                            })
                                                        }}><i className="fas fa-trash"></i></span>
                                                        <span onClick={() => {
                                                            this.setEditMode(true);
                                                            this.setEditId(item.id);
                                                            this.setCourseName(item.courseName);
                                                            this.setContent(item.content);
                                                            this.setWelcome(item.welcome);
                                                            this.setYt(item.yt);
                                                            this.setFeatures(item.features)
                                                            this.setCampus(item.campus)


                                                        }}><i className="fas fa-edit"></i></span>
                                                    </div>
                                                    <img src={item?.image} alt="" width={"100%"} />
                                                    <h3>{item.courseName}</h3>
                                                    <a href={`/${item.campus.toLowerCase()}-campus/?course=${item.url.toLowerCase()}`} style={{ color: "blue" }}>{`/${item.campus.toLowerCase()}-campus/?course=${item.url.toLowerCase()}`}</a>
                                                    <br />
                                                    <p style={{ backgroundColor: 'grey', color: 'white', padding: '.2rem', width: 'fit-content', borderRadius: '5px', fontSize: '.8rem' }}>{item.campus}</p>
                                                    <br />
                                                    <br />
                                                    <p><i>{item.welcome}</i></p>
                                                    <br />
                                                    <p>{item.content}</p>
                                                    <br />
                                                    <h4>Features</h4>
                                                    <ul>
                                                        {
                                                            item.features?.map((item, index) => (
                                                                <li key={index}>{item.heading} - {item.content}</li>
                                                            ))
                                                        }
                                                    </ul>
                                                    <hr />
                                                </div>
                                            )
                                        })
                                    }
                                </div>
                                <div>
                                    <h2>Add new</h2>
                                    <hr />
                                    <form action="">
                                        <label htmlFor="">Select the campus</label>

                                        <select name="" id=""
                                            value={this.state.campus}
                                            onChange={(e) => {
                                                this.setCampus(e.target.value);
                                            }}
                                        >
                                            <option value="Boys">Boys</option>
                                            <option value="Girls">Girls</option>
                                            {/* <option value="School">School</option> */}
                                        </select>
                                        <label htmlFor="">Course name</label>
                                        <input required type="text" name="" id="" placeholder='Course name' value={this.state.courseName} onChange={(e) => { this.setCourseName(e.target.value) }} />
                                        <label htmlFor="">Youtube link</label>
                                        <input required type="text" name="" id="" placeholder='Youtube link' value={this.state.yt} onChange={(e) => { this.setYt(e.target.value) }} />
                                        <label htmlFor="">Welcome text</label>
                                        <textarea name="news" id="news" cols="30" rows="10" placeholder='Welcome text here' value={this.state.welcome} onChange={((e) => { this.setWelcome(e.target.value) })}></textarea>
                                        <label htmlFor="">About course</label>
                                        <textarea name="news" id="news" cols="30" rows="10" placeholder='About the course or program' value={this.state.content} onChange={((e) => { this.setContent(e.target.value) })}></textarea>
                                        <label htmlFor="">Features</label>
                                        {
                                            this.state.features?.map((item, index) => {
                                                return (
                                                    <div key={index} data-type='dualspace'>
                                                        <div style={{ position: 'relative' }}>

                                                            <input type="text" placeholder='Heading' value={item.heading} onChange={(e) => {
                                                                const newFeatures = [...this.state.features];
                                                                newFeatures[index].heading = e.target.value;
                                                                this.setFeatures(newFeatures);
                                                            }} />
                                                        </div>
                                                        <div style={{ position: 'relative' }}>
                                                            <input type="text" placeholder='Content' value={item.content} onChange={(e) => {
                                                                const newFeatures = [...this.state.features];
                                                                newFeatures[index].content = e.target.value;
                                                                this.setFeatures(newFeatures);
                                                            }} />
                                                            <div data-type='controllers'>
                                                                <span onClick={() => {
                                                                    const newFeatures = [...this.state.features];
                                                                    newFeatures.splice(index, 1);
                                                                    this.setFeatures(newFeatures);
                                                                }} >
                                                                    <i className="fas fa-trash"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                )
                                            })
                                        }
                                        <button type='button' onClick={() => {

                                            this.setFeatures([...this.state.features, {
                                                heading: '',
                                                content: '',
                                            }])
                                        }}><i class="fa-solid fa-plus"></i> Add new feature</button>


                                        <input type="submit" value={this.state.editMode ? 'Update' : 'Submit'} onClick={onSubmit} />
                                        <button data-type="clear" onClick={clearForm}>Clear form </button>


                                    </form>
                                </div>
                            </div>

                        </div>


                    </div>
                );
            }
        }

        const root = ReactDOM.createRoot(document.getElementById('news_events'))
        root.render(<Overview />)
    </script>
</body>

</html>