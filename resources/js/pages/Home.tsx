import App from "@/layouts/App";
import { useTranslation } from "react-i18next";

const Home = () => {
    const { t } = useTranslation();
    return (
        <App>
            <h1 className='text-black dark:text-white bg-white dark:bg-black p-3'>{t('Home')}</h1>
        </App>
    );
};

export default Home;
