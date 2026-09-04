import { StringDecoder } from "string_decoder"

export type SpaCoverPage = {
    id:string,
    name:string,
    image_path:string,
    description:string
}

export type SpaServiceMenu = {
    id:string,
    name:string,
    description:string,
    price:number,
    title:string,
    time:string
}