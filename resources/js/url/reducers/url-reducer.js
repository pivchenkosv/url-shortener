import {createUrlAction} from "../actions/url-actions";
import UrlRecord from "../records/url-record";
import {handleActions} from "redux-actions";

const UrlReducer = handleActions({

    [createUrlAction]: (state, action) => {
        console.log('reducer')
        state.setIn(['urls'], new UrlRecord(action.url))
    },

}, new UrlRecord())

export default UrlReducer
