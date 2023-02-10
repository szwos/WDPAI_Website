--
-- PostgreSQL database dump
--

-- Dumped from database version 15.1 (Debian 15.1-1.pgdg110+1)
-- Dumped by pg_dump version 15.0

-- Started on 2023-02-10 15:39:40

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 219 (class 1255 OID 24635)
-- Name: delete_old_sessions(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.delete_old_sessions() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
  DELETE FROM public.sessions WHERE "time" < NOW() - INTERVAL '10 minutes';
  RETURN NULL;
END;
$$;


ALTER FUNCTION public.delete_old_sessions() OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 216 (class 1259 OID 24603)
-- Name: recommendations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.recommendations (
    owner integer NOT NULL,
    name character varying NOT NULL,
    "desc" character varying NOT NULL,
    img character varying(255),
    story numeric(5,2) NOT NULL,
    gameplay numeric(5,2) NOT NULL,
    graphics numeric(5,2) NOT NULL,
    climate numeric(5,2) NOT NULL,
    music numeric(5,2) NOT NULL,
    id integer NOT NULL
);


ALTER TABLE public.recommendations OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 24619)
-- Name: recommendations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.recommendations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.recommendations_id_seq OWNER TO postgres;

--
-- TOC entry 3348 (class 0 OID 0)
-- Dependencies: 217
-- Name: recommendations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.recommendations_id_seq OWNED BY public.recommendations.id;


--
-- TOC entry 218 (class 1259 OID 24632)
-- Name: sessions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sessions (
    id integer NOT NULL,
    "time" timestamp without time zone NOT NULL
);


ALTER TABLE public.sessions OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 16390)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    surname character varying(100) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 214 (class 1259 OID 16389)
-- Name: table_name_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.table_name_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.table_name_id_seq OWNER TO postgres;

--
-- TOC entry 3349 (class 0 OID 0)
-- Dependencies: 214
-- Name: table_name_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.table_name_id_seq OWNED BY public.users.id;


--
-- TOC entry 3187 (class 2604 OID 24620)
-- Name: recommendations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.recommendations ALTER COLUMN id SET DEFAULT nextval('public.recommendations_id_seq'::regclass);


--
-- TOC entry 3186 (class 2604 OID 16393)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.table_name_id_seq'::regclass);


--
-- TOC entry 3340 (class 0 OID 24603)
-- Dependencies: 216
-- Data for Name: recommendations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.recommendations (owner, name, "desc", img, story, gameplay, graphics, climate, music, id) FROM stdin;
8	Minecraft	What you need to know about Minecraft\r\n\r\nWhat is it? Minecraft is a video game in which players create and break apart various kinds of blocks in three-dimensional worlds. The game’s two main modes are Survival and Creative. In Survival, players must find their own building supplies and food. They also interact with blocklike mobs, or moving creatures. (Creepers and zombies are some of the dangerous ones.) In Creative, players are given supplies and do not have to eat to survive. They also can break all kinds of blocks immediately.\r\n\r\nAre there points or levels? No. The purpose of the game is simply to build and explore (and survive).\r\n\r\nHow many players can play it? You can play by yourself or you can play online with others. The smartphone and tablet versions offer multi-player options through WiFi networks. Players can connect to thousands of Minecraft online games (servers), some of which involve battling other players.\r\n\r\nWhich devices can I play it on? There are versions for PCs, Macs and Xbox 360. There’s also a version for iPhone, iPad, Kindle Fire and Android smartphones.\r\n\r\nHow much is it? The computer version is $26.95. The Xbox version is $20 (1,600 Microsoft points). The tablet edition is $6.99.\r\n\r\nWhere do I find it? The PC and Mac game can be downloaded at www.minecraft.net. The Xbox edition is available at Xbox Games Store (www.marketplace.xbox.com). The phone and tablet editions are sold through the iTunes App Store, Google Play and Amazon.com.\r\n\r\nHow do I get started? Players age 12 and younger must have a parent create an account for them. Always ask a parent before going online.	Minecraft_cover.png	33.00	100.00	62.00	92.00	81.00	4
8	Need for Speed	 Need for Speed - opis gry\r\n\r\nNeed for Speed to gra wyścigowa wyprodukowana przez szwedzkie studio Ghost Games i wydana przez Electronic Arts. Tytuł ukazał się na konsolach PlayStation 4 i Xbox One oraz komputerach osobistych. Była to 21. odsłona serii Need for Speed.\r\n\r\nWyprodukowany przez Ghost Games Need for Speed to swego rodzaju reboot tej popularnej serii wyścigowej. Gra posiada tryb fabularny. W jego trakcie wcielamy się w kierowcę, który przybywa do fikcyjnego miasta Ventura Bay, by stać się królem nielegalnych wyścigów.\r\n\r\nRozgrywka toczy się w otwartym świecie, po którym poruszać się możemy z dużą swobodą. Wykonywać możemy główne misje fabularne, oglądając od czasu do czasu scenki przerywnikowe z udziałem prawdziwych aktorów, oraz te poboczne. Zadanie bywają przy tym różne, choć generalnie są to zwykłe wyścigi, sprint i driftowanie. Czasami formuła ta zostaje urozmaicona jeszcze innymi atrakcjami.\r\n\r\nW przypadku misji fabularnych w Need for Speed, wiadomości o ich dostępności otrzymujemy na telefon komórkowy, w przypadku pobocznych musimy udać się odpowiednie miejsce. Co warto przy tym dodać, twórcy zaimplementowali patent z szybkim podróżowaniem jeśli nie chce nam się jeździć z punktu A do B. Wraz z postępami zbieramy doświadczenie, co szerzej otwiera kolejne podwoje. Otrzymujemy w ten sposób dostęp do trudniejszych zadań, a ponadto wraz z naszym levelem rośnie inteligencja kontrolowanych przez sztuczną inteligencję policjantów i rywali.\r\n\r\nGhost Games przygotowało także coś dla fanów tuningu. Gracze mogą tu grzebać pod maską swojego samochodu i wpływać na jego wygląd. System jest przy tym prosty i bardzo intuicyjny, dzięki czemu nie muszą oni posiadać książkowej wiedzy z dziedziny motoryzacji.\r\n\r\nNeed for Speed posiada także multiplayer. Gracze mogą się spotkać na ulicach Ventura Bay i stanąć do wspólnej rywalizacji.\r\n	nfs_cover.png	91.00	79.00	33.00	80.00	51.00	5
8	Furi	Furi is an apt name for The Game Bakers' action game, recently re-released on the Switch. \r\n\r\n Furi is a boss rush game that sees players fight through a series of 1v1 face-offs with a limited skillset, trying to learn their rhythms and routines. The game is an exercise of style over substance, but it's hard to feel aggrieved when the game's sense of style is so well defined. \r\n\r\nThe bosses you'll fight are designed by Afro Samurai creator Takashi Okazaki, and the game is wearing its Japanese inspirations on its sleeve, with each fight a whirling mess of swirling blades, curves of energy and yelled threats as you square off against a selection of unique guardians, with a lot of the game's challenge coming not from delivering the beatdown to the bosses, but working out their phases and dancing between the enemy's attempts to attack you. \r\nClick to enlarge\r\n\r\nThat is, pretty much the entire game neatly summed up in a paragraph. There are no upgrades, no items, no power-ups of any description. If this popped up in a certain spacefaring horror movie, a manic android would quickly show up to say how much they admire its purity. Furi teaches you all of its controls and every weapon in your arsenal within the first boss fight, and then it steps back and lets you experiment with it. Your strikes, twin-stick shooting and parries are all present and correct from the second you hit a button. \r\n\r\nThe game feels more like a fighting game than similar boss rush titles like Titan Souls or Shadow of the Colossus, with you predicting the enemy movements and taking steps to punish the enemy for giving you a chance. Both you and the Guardian bosses you'll fight have multiple lives, bars that refill to either donate the players lives or the different phases of the boss you're fighting. When a bar is emptied, the opponents will refill, either restarting the phase of the current boss if the player dies or recharging him to full. the opponent will refill theirs, with the fight ending when one of you runs out of lives.\r\n\r\nClick to enlarge\r\n\r\nWhile mechanically this all seems simple, the fights all have a distinct flavour. Some fights will involve lightning-fast parries and brutal beatdowns, while others involve you keeping your distance and trying to step through nigh-impossible gaps in the floating death barrelling through the arena. Fights take place in darkened platforms, well-lit fields, and labyrinthian arenas full of walls, laser beams and your enemy, relentlessly chasing you down.\r\n\r\nA stand-out fight is the third boss, The Line, an old man with the power to bend time. He's locked inside three separate shields. Shooting the shields weakens them, eventually carving a hole, but there's a catch: every round that you fire that damages the shield then bounces around trying to damage you. So, if you try to burn down the entire shield with sustained fire you'll be in the middle of an apocalypse of your own making. The smart option is to fire charged shots, targeting a specific part of the shield with accurate shots, meaning you can hit the boss as soon as possible without filling the screen with projectiles for you to dodge. \r\n\r\nClick to enlarge\r\n\r\nFuri's tone and story hit the right notes for me, with the main character trying to escape the prison he's trapped in and reach a free earth below, each fight bookended with a long exposition-laden walk between yourself and a mysterious companion before you're tossed into the next battle. These walks are unskippable, but you can automate your walking and take it as a cutscene, which I found preferable. \r\n\r\nThis is all helped by a phenomenal soundtrack, which keeps the energy high for each fight tension ratcheting the throbbing background music urges you to kill, kill, kill. \r\n\r\nCombat has a pace that I found satisfying but it lacks any real heft. Hitting someone with a fully charged attack feels like it should deliver a solid thump, but instead combat feels slightly floaty. Parries are satisfying, but the warm feelings it gives you are quickly taken away when the enemy follows up with another attack and flattens you. \r\n\r\nIn flow, when I was taking a boss down using my entire selection of tools, ruthlessly punishing missteps by the AI and dodging every attack. When this happens, Furi is at its finest. When this happens, it's impossible not to recommend Furi. \r\n\r\nClick to enlarge\r\n\r\nHowever these moments are few and far between, and most of my experience with Furi was middling. Furi is a game that does most things right, but for some reason the parts don't quite come together as part of a solid whole. I enjoyed the game and enjoyed the time I spent with it, but there are so many sparks of brilliance here it's a bitter disappointment that it occasionally manages to fall completely flat. \r\n\r\nSo, Furi by name, Fury by nature. The game is a rewarding and fun boss rush game that too often crosses the line to frustrating, but if the game clicks with you, you'll struggle to put it down. \r\n\r\n	furi_cover.jpg	30.00	100.00	82.00	63.00	100.00	6
\.


--
-- TOC entry 3342 (class 0 OID 24632)
-- Dependencies: 218
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sessions (id, "time") FROM stdin;
8	2023-02-10 14:34:06.216702
\.


--
-- TOC entry 3339 (class 0 OID 16390)
-- Dependencies: 215
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, name, surname, email, password) FROM stdin;
8	Szymon	Rozmus	szwos@gmail.com	5f4dcc3b5aa765d61d8327deb882cf99
9	Borys	Johnson	Borys@email.pl	5f4dcc3b5aa765d61d8327deb882cf99
\.


--
-- TOC entry 3350 (class 0 OID 0)
-- Dependencies: 217
-- Name: recommendations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.recommendations_id_seq', 6, true);


--
-- TOC entry 3351 (class 0 OID 0)
-- Dependencies: 214
-- Name: table_name_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.table_name_id_seq', 9, true);


--
-- TOC entry 3191 (class 2606 OID 24630)
-- Name: recommendations recommendations_id_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.recommendations
    ADD CONSTRAINT recommendations_id_key UNIQUE (id);


--
-- TOC entry 3193 (class 2606 OID 24628)
-- Name: recommendations recommendations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.recommendations
    ADD CONSTRAINT recommendations_pkey PRIMARY KEY (id);


--
-- TOC entry 3189 (class 2606 OID 24602)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 3195 (class 2620 OID 24636)
-- Name: sessions delete_old_sessions_trigger; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER delete_old_sessions_trigger AFTER INSERT ON public.sessions FOR EACH STATEMENT EXECUTE FUNCTION public.delete_old_sessions();


--
-- TOC entry 3194 (class 2606 OID 24608)
-- Name: recommendations recommendations_users_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.recommendations
    ADD CONSTRAINT recommendations_users_id_fk FOREIGN KEY (owner) REFERENCES public.users(id);


-- Completed on 2023-02-10 15:39:40

--
-- PostgreSQL database dump complete
--

