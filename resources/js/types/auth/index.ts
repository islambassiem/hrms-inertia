interface Card {
    key: string;
    role: string;
    title: string;
    subtitle: string;
    href: string;
    icon: React.ReactNode;
    color: string;
}
export interface CardProps {
    card: Card;
}
