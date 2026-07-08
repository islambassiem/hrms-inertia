export interface Resource<T> {
    data: ResourceObject<T>[];
    links: Links;
    meta: Meta;
}

interface ResourceObject<T> {
    id: string;
    type: string;
    attributes: T;
}
export interface Links {
    first: string;
    last: string;
    prev: any;
    next: string;
}

export interface Meta {
    current_page: number;
    from: number;
    last_page: number;
    links: Link[];
    path: string;
    per_page: number;
    to: number;
    total: number;
}

export interface Link {
    url?: string;
    label: string;
    page?: number;
    active: boolean;
}
