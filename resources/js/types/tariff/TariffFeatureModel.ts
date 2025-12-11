export interface TariffFeatureModel {
    id: number;
    system_name: string;
    display_name: string;
    description: string | null;
    category: 'included' | 'detailed';
    pivot?: {
        is_included: boolean;
    };
}
