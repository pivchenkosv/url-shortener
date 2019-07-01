import React, {Component} from 'react';
import './home.scss'
import axios from "axios";

export default class App extends Component {

    state = {
        link: '',
        shortUrl: '',
        usageQuantity: 0,
    }

    componentDidMount() {
        console.log(this.props)
    }

    onSubmit = () => {
        axios.post('/api/urls', {
            original_url: this.state.link
        }).then(response => {
            console.log('response', response)
            this.setState({
                shortUrl: 'shourl.loc/' + response.data.data.code,
                usageQuantity: response.data.data.usage_quantity,
            }, () => {
                const info = document.getElementById('info');
                info.className = 'my-3 info info-shown';
            })
        })
    }

    onLinkChange = (e) => {
        const {name, value} = e.target;

        this.setState({
            [name]: value,
        })
    }

    render() {

        return (
            <div className='container jumbotron card shadow w-50 py-4'>
                <form method='post' action='/urls'>
                    <div>
                        <h3 className='modal-title mb-2'>Create your short url</h3>
                    </div>
                    <div className='container row justify-content-between'>
                        <input className="form-control col-9"
                               type='text'
                               name='link'
                        />
                        <button type='button'
                                className='btn btn-primary float-right'
                        >Create</button>
                    </div>
                </form>
                <div className='my-3 info' id='info'>
                    <p>Short URL:&nbsp; {this.state.shortUrl || null}</p>
                    <p>Original URL:&nbsp; {this.state.link || null}</p>
                    <p>Usage quantity:&nbsp; {this.state.usageQuantity || 0}</p>
                </div>
            </div>
        );
    }
}
