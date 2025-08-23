import App from "@/layouts/AppLayout";
import { t } from "i18next";

const Home = () => {
    return (
        <App>
            <div className="card">
                <h1 className="text-2xl font-bold text-primary">{t('Hello World')}</h1>
                <p className="text-text-muted">{t('This is a semantic palette demo')}</p>

                <button className="btn btn-primary mt-4">{t('Save')}</button>
                <button className="btn btn-danger mt-4 ms-2">{t('Cancel')}</button>
                <p className="mt-4 text-justify text-text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat blanditiis mollitia odio hic ullam, reprehenderit perferendis quidem? Minima illum deserunt cupiditate autem, tenetur iusto quis eveniet? Cupiditate atque non accusamus.</p>
            </div>
        </App>
    );
};

export default Home;
