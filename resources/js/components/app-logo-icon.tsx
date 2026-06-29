import logo from '@assets/imgs/logo.png';
import type { ImgHTMLAttributes } from 'react';

export default function AppLogoIcon(props: ImgHTMLAttributes<HTMLImageElement>) {
    return (
        <img {...props} src={logo} alt="logo" />
    );
}
