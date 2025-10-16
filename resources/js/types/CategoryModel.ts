export interface CategoryModel {
    id: number
    name: string
    is_starred: boolean
    parent_id: number | null
    description: string | null
    children?: CategoryModel[]
}

