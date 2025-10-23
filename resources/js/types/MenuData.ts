export interface MenuData {
    id: number;
    label: string;
    url: string;
    type: 'navbar' | 'sidebar';
    order: number;
    is_active: boolean;
}
