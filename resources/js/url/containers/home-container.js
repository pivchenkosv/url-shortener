import {connect} from 'react-redux';

import Home from "../components/home";
import {createUrlAction} from "../actions/url-actions";

export default connect(
    state => ({
        urls: state.urls,
    }),
    dispatch => ({
        loadUrl: id => dispatch(createUrlAction(id))
    }),
)(Home);
