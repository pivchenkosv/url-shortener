import React, {Component} from 'react';
import './home.scss'
import PropTypes from "prop-types";

class Home extends Component {
    static propTypes = {
        url: PropTypes.object,
        loadUrl: PropTypes.func,
        createShortUrl: PropTypes.func
    };

    state = {
        originalUrl: '',
        shortUrl: '',
        usageQuantity: 0,
    }

    componentDidMount() {
        const {url} = this.props.match.params;
        url && this.props.loadUrl(url, this.props.history);
    }

    onSubmit = (e) => {
        e.preventDefault()
        this.props.createShortUrl(this.state.originalUrl)
    }

    onLinkChange = (e) => {
        const {name, value} = e.target;

        this.setState({
            [name]: value,
        })
    }

    render() {
        const {url} = this.props

        return (
            <div className='container jumbotron card shadow w-50 py-4'>
                <form onSubmit={(e) => this.onSubmit(e)}>
                    <div>
                        <h3 className='modal-title mb-2'>Create your short url</h3>
                    </div>
                    <div className='container row justify-content-between'>
                        <input className="form-control col-9"
                               type='text'
                               name='originalUrl'
                               onChange={this.onLinkChange}
                        />
                        <button type='submit'
                                className='btn btn-primary float-right'
                        >Create</button>
                    </div>
                </form>
                <div className='my-3 info' id='info'>
                    <p>Short URL:&nbsp; {url && url.shortUrl || null}</p>
                    <p>Original URL:&nbsp; {url && url.originalUrl || null}</p>
                    <p>Usage quantity:&nbsp; {url && url.usageQuantity || 0}</p>
                </div>

            </div>
        );
    }
}

export default Home
