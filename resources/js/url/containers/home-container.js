import {connect} from 'react-redux';

import Home from "../components/home";
import {createUrlSagaAction, loadUrlSagaAction} from "../actions/url-actions";

export default connect(
    state => ({
        url: state.urls.get('url'),
    }),
    dispatch => ({
        loadUrl: (id, history) => dispatch(loadUrlSagaAction(id, history)),
        createShortUrl: originalUrl => dispatch(createUrlSagaAction(originalUrl)),
    }),
)(Home);
