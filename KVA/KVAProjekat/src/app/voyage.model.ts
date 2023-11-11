import { Comments } from "./comment.model";

export interface Voyage {
    id: number;
    type: 'Voz' | 'Avion' | 'Autobus';
    name: string;
    price: number;
    image?: string;
    date?: Date;
    description?: string;
    likes: number;
    img?: string;
    status?: 'Gotovo' | 'Uskoro' | null;
    likeUsers?: number[];
    comments?: Comments[];
    reservedUsers?: number[];
    cancelledUsers?: number[];
    
}