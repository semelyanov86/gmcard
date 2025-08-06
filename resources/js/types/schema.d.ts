export interface SchemaOrganization {
    '@type': 'Organization';
    name: string;
    url: string;
    logo?: string;
    description?: string;
    contactPoint?: {
        '@type': 'ContactPoint';
        contactType: string;
        email: string;
    };
}

export interface SchemaWebsite {
    '@type': 'WebSite';
    name: string;
    url: string;
    description?: string;
}

export interface SchemaData {
    organization?: SchemaOrganization;
    website?: SchemaWebsite;
}

export interface MetaData {
    title: string;
    description: string;
    canonical: string;
    og: {
        title: string;
        description: string;
        image: string;
        type: string;
    };
    twitter?: {
        card: string;
        title: string;
        description: string;
        image: string;
        site: string;
    };
    schema?: SchemaData;
}
