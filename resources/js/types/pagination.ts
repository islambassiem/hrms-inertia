export interface JSONAPIResponse {
    data: Data[];
    links: Links;
    meta: Meta;
}

export interface Data {
    id: string
    type: string
    attributes: Attributes
}

export interface Attributes {
    id: number
    employee_code: string
    name: string
    phone: string
    image: string
    email: string
    extentions: string[]
}

export interface Links {
    first: string
    last: string
    prev: any
    next: string
}

export interface Meta {
    current_page: number
    from: number
    last_page: number
    links: Link[]
    path: string
    per_page: number
    to: number
    total: number
}

export interface Link {
    url?: string
    label: string
    page?: number
    active: boolean
}

