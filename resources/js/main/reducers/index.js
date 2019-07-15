import {combineReducers} from "redux";
import UrlReducer from "../../url/reducers/url-reducer";
import NotificationReducer from "../../shared/notification/reducers/notification-reducer";

export default combineReducers({
    urls: UrlReducer,
    notifications: NotificationReducer,
});
