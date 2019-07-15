import {putUrlAction} from "../actions/url-actions";
import {handleActions} from "redux-actions";
import UrlsRecord from "../records/urls-record";
import UrlRecord from "../records/url-record";
import {addNotificationAction} from "../../shared/notification/actions/notification-actions";

const UrlReducer = handleActions({

    [putUrlAction]: (state, action) => state.set('url', UrlRecord.parse(action.payload)),

}, new UrlsRecord())

export default UrlReducer
