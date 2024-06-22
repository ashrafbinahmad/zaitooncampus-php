<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <?php include '../../lib/admin_layout.php'; ?>

    <div id="photo_gallery"></div>


    <script type="text/babel">


        class PhotoGallery extends React.Component {
            // const[fetchedData, setFetchedData] = useState([]);
            // const[description, setDescription] = useState('');
            // const[image, setImage] = useState({ value: '' });
            // const[uploadProgress, setUploadProgress] = useState(0);
            // const[submitId, setSubmitId] = useState(0);

            // const[editMode, setEditMode] = useState(false);
            // const[editId, setEditId] = useState('');

            constructor(props) {
                super(props);
                this.state = {
                    fetchedData: [],
                    description: '',
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
            setDescription = (data) => {
                this.setState({ description: data })
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

            loadData() {
                getAllData('photo_gallery').then((querySnapShot) => {
                    const data = querySnapShot.docs.map((doc) => {
                        return { ...doc.data(), id: doc.id };

                    }
                    );
                    //console.log(data)
                    this.setFetchedData(data.reverse());

                })
            }

            componentDidMount() {
                this.loadData();

            }


            render() {
                const clearForm = () => {
                    this.setDescription('');
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
                    if (!this.state.description) {
                        toast.error('Please fill all the fields');
                        return;
                    }
                    if (!imageFile && !this.state.editMode) {
                        toast.error('Please upload an image');
                        return;
                    }
                    const uploadTask = uploadImage(imageFile, `photo_gallery/${id}.${fileExtension}`).then(async (snapshot) => {
                        //console.log('Uploaded a blob or file!');
                        if (this.state.editMode) {
                            const data = {
                                description: this.state.description
                            }
                            if (imageFile) data.image = await getDownloadUrl(imageFile, `photo_gallery/${id}.${fileExtension}`)
                            updateData('photo_gallery', id, data).then(() => {
                                clearForm()
                                this.loadData()
                            })
                        }
                        else {
                            const data = {
                                description: this.state.description,
                                image: await getDownloadUrl(imageFile, `photo_gallery/${id}.${fileExtension}`)
                            }
                            writeDataWithId('photo_gallery', id, data).then(() => {
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
                                    <h2>All photos</h2>
                                    <hr />
                                    {
                                        this.state.fetchedData.map((item, index) => {
                                            return (
                                                <div key={index} data-type='card'>
                                                    <div data-type='controllers'>
                                                        <span onClick={() => {
                                                            deleteData('photo_gallery', item.id).then(() => {
                                                                this.loadData()
                                                            })
                                                        }}>
                                                            <i className="fas fa-trash"></i>

                                                        </span>
                                                        <span onClick={() => {
                                                            this.setEditMode(true);
                                                            this.setEditId(item.id);
                                                            this.setDescription(item.description);
                                                            // setImage({value: item.image});

                                                        }} >
                                                            <i className="fas fa-edit"></i>

                                                        </span>
                                                    </div>
                                                    <img src={item?.image} alt="" width={"100%"} />
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
                                        <label htmlFor="">Image description</label>
                                        <textarea name="news" id="news" cols="30" rows="10" placeholder='Image description' value={this.state.description} onChange={((e) => { this.setDescription(e.target.value) })}></textarea>
                                        <label htmlFor="">Photo - size &lt; 250kb</label>
                                        <progress value={this.state.uploadProgress} max="100" id="uploader" style={{ width: '100%' }}>{this.state.uploadProgress}%</progress>

                                        <input required type="file" name="" id="" value={this.state.image.value}
                                            onChange={async (e) => {
                                                //console.log(e.target);
                                                //check file size
                                                if (e.target.files[0]?.size > 250 * 1024) {
                                                    toast.error('File size must be less than 250 KB');
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

        const root = ReactDOM.createRoot(document.getElementById('photo_gallery'))
        root.render(<PhotoGallery />)
    </script>
</body>

</html>