export interface CategoryModel {
    id: number;
    name: string;
    is_starred: boolean;
    parent_id: number | null;
    description: string | null;
    icon_index: number | null;
    children?: CategoryModel[];
}
