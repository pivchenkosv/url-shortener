import axios from "axios";
import {Redirect} from "react-router-dom";
import React, {Component} from "react";

class RedirectOriginal extends Component {
    state = {
        redirectUrl: ''
    }

    componentDidMount() {
        axios.get(`/api/${this.props.match.params.code}`)
            .then(response => {
                window.location.assign(response.data.data.original_url);
                // this.setState({redirectUrl: response.data.data.original_url});
            })
    }

    render() {
        return <Redirect to={this.state.redirectUrl}/>
    }
}

export default RedirectOriginal;
