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
                    content: '',
                    date: '',
                    image: { value: '' },
                    uploadProgress: 0,
                    submitId: 0,
                    editMode: false,
                    editId: '',

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


            componentDidMount() {
                getAllData('news_and_events').then((querySnapShot) => {
                    const data = querySnapShot.docs.map((doc) => {
                        return { ...doc.data(), id: doc.id };

                    }
                    );
                    //console.log(data)
                    this.setFetchedData(data.reverse());

                })
            }
            loadData() {
                getAllData('news_and_events').then((querySnapShot) => {
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
                    this.setDate('');
                    this.setImage({ value: '' });
                    this.setEditMode(false);
                    this.setEditId('');
                }

                const onSubmit = async (e) => {


                    e.preventDefault();
                    const id = this.state.editMode ? this.state.editId : getRandomId();
                    const imageFile = this.state.image.value != '' ? this.state.image.files[0] : null

                    const fileExtension = imageFile?.name.split('.').pop();
                    if (imageFile && fileExtension != 'jpg' && fileExtension != 'jpeg' && fileExtension != 'png' && fileExtension != 'JPG' && fileExtension != 'JPEG' && fileExtension != 'PNG') {
                        toast.error('Please upload a valid image file');
                        return;
                    }
                    if (!this.state.headline || !this.state.content || !this.state.date) {
                        toast.error('Please fill all the fields');
                        return;
                    }
                    if (!imageFile && !this.state.editMode) {
                        toast.error('Please upload an image');
                        return;
                    }
                    const uploadTask = uploadImage(imageFile, `news_and_events/${this.state.headline}___${id}.${fileExtension}`).then(async (snapshot) => {
                        //console.log('Uploaded a blob or file!');
                        if (this.state.editMode) {
                            const data = {
                                headline: this.state.headline,
                                content: this.state.content,
                                date: this.state.date,
                            }
                            if (imageFile) data.image = await getDownloadUrl(imageFile, `news_and_events/${this.state.headline}___${id}.${fileExtension}`)
                            updateData('news_and_events', id, data).then(() => {
                                clearForm()
                                this.loadData()
                            })
                        }
                        else {
                            const data = {
                                headline: this.state.headline,
                                content: this.state.content,
                                date: this.state.date,
                                image: await getDownloadUrl(imageFile, `news_and_events/${this.state.headline}___${id}.${fileExtension}`)
                            }
                            writeDataWithId('news_and_events', id, data).then(() => {
                                // alert('News or event added successfully');
                                clearForm()
                                this.loadData()
                            })
                        }
                    });

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
                                                            deleteData('news_and_events', item.id).then(() => {
                                                                this.loadData()
                                                            })
                                                        }} >
                                                            <i class="fa-sharp fa-solid fa-trash"></i>
                                                        </span>
                                                        <span onClick={() => {
                                                            this.setEditMode(true);
                                                            this.setEditId(item.id);
                                                            this.setHeadline(item.headline);
                                                            this.setContent(item.content);
                                                            this.setDate(item.date);
                                                            // setImage({value: item.image});

                                                        }} ><i class="fa-solid fa-pen-to-square"></i>
                                                        </span>
                                                    </div>
                                                    <img src={item?.image} alt={item.headline} width={"100%"} />
                                                    <h3>{item.headline}</h3>
                                                    <p>{item.date}</p>
                                                    <p>{item.content}</p>
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
                                        <label htmlFor="">Headline</label>
                                        <input required type="text" name="" id="" placeholder='Headline' value={this.state.headline} onChange={(e) => { this.setHeadline(e.target.value) }} />
                                        <label htmlFor="">About the event / News content</label>
                                        <textarea name="news" id="news" cols="30" rows="10" placeholder='About the event / News content' value={this.state.content} onChange={((e) => { this.setContent(e.target.value) })}></textarea>
                                        <label htmlFor="">Date of the event / news</label>
                                        <input required type="date" value={this.state.date} onChange={(e) => { this.setDate(e.target.value) }} />
                                        <label htmlFor="">Photo</label>
                                        <progress value={this.state.uploadProgress} max="100" id="uploader" style={{ width: '100%' }}>{this.state.uploadProgress}%</progress>
                                        <input required type="file" name="" id="" placeholder='Campuses count' value={this.state.image.value}
                                            onChange={async (e) => {
                                                //console.log(e.target);
                                                //check file size
                                                if (e.target.files[0]?.size > 300 * 1024) {
                                                    toast.error('File size must be less than 300 KB');
                                                }
                                                else {
                                                    this.setImage(e.target)
                                                }

                                            }} />

                                        <input type="submit" value={this.state.editMode ? 'Update' : 'Submit'} onClick={onSubmit} />
                                        <button data-type="clear" onClick={clearForm}> Clear form </button>
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