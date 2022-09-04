type RequestConfig = {
    url: string;
    method: string;
    data?: any;
}

type AnyObject = { [key: string]: any };

export {
    RequestConfig,
    AnyObject,
};
