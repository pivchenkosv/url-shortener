import {connect} from 'react-redux';

import RedirectOriginal from "../components/redirect";
import {redirectSagaAction} from "../actions/url-actions";

export default connect(
    null,
    dispatch => ({
        redirect: (code, history) => dispatch(redirectSagaAction(code, history))
    }),
)(RedirectOriginal);
