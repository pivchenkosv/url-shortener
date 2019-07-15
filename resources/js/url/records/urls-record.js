import { Record } from 'immutable';
import UrlRecord from "./url-record";

const UrlsRecord = new Record({
    message: null,
    url: new UrlRecord(),
    isLoading: false,
})

export default UrlsRecord
