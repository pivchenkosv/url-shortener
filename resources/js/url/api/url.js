import axios from "axios";

export const loadUrlById = ({id}) => {
    return axios.get(`/api/urls/${id}`)
}

export const createShortUrl = ({originalUrl}) => {
    return axios.post('/api/urls', {
        original_url: originalUrl
    })
}

export const loadUrlByCode = ({code}) => {
    return axios.get(`/api/${code}`)
}
