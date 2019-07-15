import { Record } from 'immutable';

class UrlRecord extends Record({
    id: 0,
    originalUrl: '',
    shortUrl: '',
    usageQuantity: 0,
}) {
    static parse({url}) {
        return new UrlRecord({
            id: url.id,
            originalUrl: url.original_url,
            shortUrl: `https://shourl.loc/${url.code}`,
            usageQuantity: url.usage_quantity,
        });
    }
}

export default UrlRecord
