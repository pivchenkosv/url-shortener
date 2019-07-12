import {combineReducers} from "redux";
import UrlReducer from "../../url/reducers/url-reducer";

export default combineReducers({
    urls: UrlReducer,
});
