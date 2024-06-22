<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <?php include '../../lib/admin_layout.php'; ?>

    <div id="video_gallery"></div>


    <script type="text/babel">


        class VideoGallery extends React.Component {
            // const[fetchedData, setFetchedData] = useState([]);
            // const[description, setDescription] = useState('');
            // const[embedId, setEmbedId] = useState('');
            // const[submitId, setSubmitId] = useState(0);
            // const[ytUrl, setYtUrl] = useState('');

            // const[editMode, setEditMode] = useState(false);
            // const[editId, setEditId] = useState('');


            constructor(props) {
                super(props);
                this.state = {
                    fetchedData: [],
                    description: '',
                    embedId: '',
                    submitId: 0,
                    ytUrl: '',
                    editMode: false,
                    editId: '',

                }
            }
            setFetchedData = (data) => {
                this.setState({ fetchedData: data })
            }
            setDescription = (data) => {
                this.setState({ description: data })
            }
            setEmbedId = (data) => {
                this.setState({ embedId: data })
            }
            setSubmitId = (data) => {
                this.setState({ submitId: data })
            }
            setYtUrl = (data) => {
                this.setState({ ytUrl: data })
            }
            setEditMode = (data) => {
                this.setState({ editMode: data })
            }

            setEditId = (data) => {
                this.setState({ editId: data })
            }


            loadData() {
                getAllData('video_gallery').then((querySnapShot) => {
                    const data = querySnapShot.docs.map((doc) => {
                        return { ...doc.data(), id: doc.id };

                    }
                    );
                    //console.log(data)
                    this.setFetchedData(data.reverse());

                })
            }

            componentDidMount() {
                this.loadData()
            }




            render() {
                const clearForm = () => {
                    this.setYtUrl('');
                    this.setDescription('');
                    this.setEmbedId('')
                    this.setEditMode(false);
                    this.setEditId('');
                }

                const onSubmit = (e) => {
                    e.preventDefault();
                    const id = this.state.editMode ? this.state.editId : getRandomId();

                    if (!this.state.description || !this.state.embedId) {
                        toast.error('Please fill all the fields');
                        return;
                    }

                    const data = {
                        description: this.state.description,
                        embedId: this.state.embedId
                    }
                    writeDataWithId('video_gallery', id, data).then(() => {
                        clearForm()
                        this.loadData()
                    })
                }
                const getEmbedIdFromUrl = (url) => {
                    const regex = /(?<=watch\?v=|\/embed\/|youtu\.be\/|\/v\/|watch\?v%3D|watch\?feature=player_embedded&v=|%2Fvideos%2F|embed\/)([a-zA-Z0-9_-]{11})/g;
                    const embedId = url.match(regex)?.[0];
                    //console.log(embedId)
                    return embedId;
                }
                return (
                    <div className='main' >
                        <div className='container'>
                            <div data-type="dualspace">
                                <div>
                                    <h2>All videos</h2>
                                    <hr />
                                    {
                                        this.state.fetchedData.map((item, index) => {
                                            return (
                                                <div key={index} data-type='card'>
                                                    <div data-type='controllers'>
                                                        <span onClick={() => {
                                                            deleteData('video_gallery', item.id).then(() => {
                                                                this.loadData()

                                                            })
                                                        }} >
                                                            <i className="fas fa-trash"></i>
                                                        </span>
                                                        <span onClick={() => {
                                                            this.setEditMode(true);
                                                            this.setEditId(item.id);
                                                            this.setDescription(item.description);
                                                            this.setEmbedId(item.embedId);
                                                            // setImage({value: item.image});

                                                        }} >
                                                            <i className="fas fa-edit"></i>
                                                        </span>
                                                    </div>
                                                    <iframe
                                                        width="853"
                                                        height="480"
                                                        src={`https://www.youtube.com/embed/${item.embedId}`}
                                                        frameBorder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                        allowFullScreen
                                                        title="Embedded youtube"
                                                        style={{ width: '100%', height: '100%' }}
                                                    />
                                                    <h4>{item.description}</h4>
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
                                        <label htmlFor="">Yotube video url</label>
                                        <input required type="text" name="" id="" placeholder='Paste youtube video url to get embed id' value={this.state.ytUrl} onChange={(e) => {
                                            this.setYtUrl(e.target.value)
                                            this.setEmbedId(getEmbedIdFromUrl(e.target.value))

                                        }} />
                                        <label htmlFor="">Embed id</label>
                                        <input required type="text" name="" id="" placeholder='Embed id' value={this.state.embedId} onChange={(e) => { this.setEmbedId(e.target.value) }} />
                                        <label htmlFor="">Video description</label>
                                        <textarea name="news" id="news" cols="30" rows="10" placeholder='Video description' value={this.state.description} onChange={((e) => { this.setDescription(e.target.value) })}></textarea>
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

        const root = ReactDOM.createRoot(document.getElementById('video_gallery'))
        root.render(<VideoGallery />)
    </script>
</body>

</html>