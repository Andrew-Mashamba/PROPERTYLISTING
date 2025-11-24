--
-- PostgreSQL database dump
--

-- Dumped from database version 17.2
-- Dumped by pg_dump version 17.2

-- Started on 2025-11-24 14:23:16

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 217 (class 1259 OID 629269)
-- Name: banks; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.banks (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    short_name character varying(255),
    logo character varying(255),
    description text,
    website character varying(255),
    phone character varying(255),
    email character varying(255),
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.banks OWNER TO postgres;

--
-- TOC entry 218 (class 1259 OID 629275)
-- Name: banks_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.banks_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.banks_id_seq OWNER TO postgres;

--
-- TOC entry 5118 (class 0 OID 0)
-- Dependencies: 218
-- Name: banks_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.banks_id_seq OWNED BY public.banks.id;


--
-- TOC entry 219 (class 1259 OID 629276)
-- Name: cache; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cache (
    key character varying(255) NOT NULL,
    value text NOT NULL,
    expiration integer NOT NULL
);


ALTER TABLE public.cache OWNER TO postgres;

--
-- TOC entry 220 (class 1259 OID 629281)
-- Name: cache_locks; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cache_locks (
    key character varying(255) NOT NULL,
    owner character varying(255) NOT NULL,
    expiration integer NOT NULL
);


ALTER TABLE public.cache_locks OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 629286)
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO postgres;

--
-- TOC entry 222 (class 1259 OID 629292)
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.failed_jobs_id_seq OWNER TO postgres;

--
-- TOC entry 5119 (class 0 OID 0)
-- Dependencies: 222
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- TOC entry 223 (class 1259 OID 629293)
-- Name: financing_inquiries; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.financing_inquiries (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    property_id bigint NOT NULL,
    loan_product_id bigint NOT NULL,
    full_name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    phone character varying(255) NOT NULL,
    monthly_income numeric(15,2) NOT NULL,
    employment_status character varying(255) NOT NULL,
    loan_amount numeric(15,2) NOT NULL,
    loan_tenure_months integer NOT NULL,
    additional_info text,
    status character varying(255) DEFAULT 'pending'::character varying NOT NULL,
    admin_notes text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.financing_inquiries OWNER TO postgres;

--
-- TOC entry 224 (class 1259 OID 629299)
-- Name: financing_inquiries_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.financing_inquiries_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.financing_inquiries_id_seq OWNER TO postgres;

--
-- TOC entry 5120 (class 0 OID 0)
-- Dependencies: 224
-- Name: financing_inquiries_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.financing_inquiries_id_seq OWNED BY public.financing_inquiries.id;


--
-- TOC entry 225 (class 1259 OID 629300)
-- Name: inquiries; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.inquiries (
    id bigint NOT NULL,
    from_user_id bigint NOT NULL,
    to_user_id bigint NOT NULL,
    property_id bigint,
    subject character varying(255) NOT NULL,
    message text NOT NULL,
    status character varying(255) DEFAULT 'new'::character varying NOT NULL,
    priority character varying(255) DEFAULT 'normal'::character varying NOT NULL,
    contact_email character varying(255),
    contact_phone character varying(255),
    read_at timestamp(0) without time zone,
    replied_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.inquiries OWNER TO postgres;

--
-- TOC entry 226 (class 1259 OID 629307)
-- Name: inquiries_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.inquiries_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.inquiries_id_seq OWNER TO postgres;

--
-- TOC entry 5121 (class 0 OID 0)
-- Dependencies: 226
-- Name: inquiries_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.inquiries_id_seq OWNED BY public.inquiries.id;


--
-- TOC entry 227 (class 1259 OID 629308)
-- Name: job_batches; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.job_batches (
    id character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    total_jobs integer NOT NULL,
    pending_jobs integer NOT NULL,
    failed_jobs integer NOT NULL,
    failed_job_ids text NOT NULL,
    options text,
    cancelled_at integer,
    created_at integer NOT NULL,
    finished_at integer
);


ALTER TABLE public.job_batches OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 629313)
-- Name: jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.jobs (
    id bigint NOT NULL,
    queue character varying(255) NOT NULL,
    payload text NOT NULL,
    attempts smallint NOT NULL,
    reserved_at integer,
    available_at integer NOT NULL,
    created_at integer NOT NULL
);


ALTER TABLE public.jobs OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 629318)
-- Name: jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.jobs_id_seq OWNER TO postgres;

--
-- TOC entry 5122 (class 0 OID 0)
-- Dependencies: 229
-- Name: jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.jobs_id_seq OWNED BY public.jobs.id;


--
-- TOC entry 230 (class 1259 OID 629319)
-- Name: loan_products; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.loan_products (
    id bigint NOT NULL,
    bank_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    description text,
    interest_rate numeric(5,2) NOT NULL,
    min_tenure_months integer NOT NULL,
    max_tenure_months integer NOT NULL,
    min_amount numeric(15,2) NOT NULL,
    max_amount numeric(15,2) NOT NULL,
    processing_fee_percentage numeric(5,2) DEFAULT '0'::numeric NOT NULL,
    requirements text,
    features text,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.loan_products OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 629326)
-- Name: loan_products_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.loan_products_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.loan_products_id_seq OWNER TO postgres;

--
-- TOC entry 5123 (class 0 OID 0)
-- Dependencies: 231
-- Name: loan_products_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.loan_products_id_seq OWNED BY public.loan_products.id;


--
-- TOC entry 232 (class 1259 OID 629327)
-- Name: materials; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.materials (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    description text NOT NULL,
    price numeric(10,2) NOT NULL,
    sku character varying(255) NOT NULL,
    category character varying(255) NOT NULL,
    brand character varying(255) NOT NULL,
    image_url character varying(255) NOT NULL,
    stock_quantity integer DEFAULT 0 NOT NULL,
    unit character varying(255) DEFAULT 'piece'::character varying NOT NULL,
    specifications json,
    is_featured boolean DEFAULT false NOT NULL,
    is_available boolean DEFAULT true NOT NULL,
    discount_percentage numeric(5,2) DEFAULT '0'::numeric NOT NULL,
    supplier_name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    images json,
    min_stock_level integer DEFAULT 5 NOT NULL,
    owner_nida character varying(255),
    business_license_document character varying(255),
    supplier_certificate character varying(255),
    owner_phone character varying(255),
    owner_email character varying(255),
    verification_status character varying(255) DEFAULT 'pending'::character varying NOT NULL,
    verification_notes text
);


ALTER TABLE public.materials OWNER TO postgres;

--
-- TOC entry 233 (class 1259 OID 629339)
-- Name: materials_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.materials_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.materials_id_seq OWNER TO postgres;

--
-- TOC entry 5124 (class 0 OID 0)
-- Dependencies: 233
-- Name: materials_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.materials_id_seq OWNED BY public.materials.id;


--
-- TOC entry 234 (class 1259 OID 629340)
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- TOC entry 235 (class 1259 OID 629343)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.migrations_id_seq OWNER TO postgres;

--
-- TOC entry 5125 (class 0 OID 0)
-- Dependencies: 235
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 236 (class 1259 OID 629344)
-- Name: order_items; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.order_items (
    id bigint NOT NULL,
    order_id bigint NOT NULL,
    material_id bigint,
    product_name character varying(255) NOT NULL,
    product_sku character varying(255),
    price numeric(12,2) NOT NULL,
    quantity integer NOT NULL,
    subtotal numeric(12,2) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.order_items OWNER TO postgres;

--
-- TOC entry 237 (class 1259 OID 629349)
-- Name: order_items_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.order_items_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.order_items_id_seq OWNER TO postgres;

--
-- TOC entry 5126 (class 0 OID 0)
-- Dependencies: 237
-- Name: order_items_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.order_items_id_seq OWNED BY public.order_items.id;


--
-- TOC entry 238 (class 1259 OID 629350)
-- Name: orders; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.orders (
    id bigint NOT NULL,
    order_number character varying(255) NOT NULL,
    buyer_id bigint NOT NULL,
    supplier_id bigint,
    subtotal numeric(12,2) NOT NULL,
    tax numeric(12,2) DEFAULT '0'::numeric NOT NULL,
    shipping_fee numeric(12,2) DEFAULT '0'::numeric NOT NULL,
    total numeric(12,2) NOT NULL,
    status character varying(255) DEFAULT 'pending'::character varying NOT NULL,
    payment_status character varying(255) DEFAULT 'unpaid'::character varying NOT NULL,
    payment_method character varying(255),
    shipping_address text,
    billing_address text,
    notes text,
    paid_at timestamp(0) without time zone,
    shipped_at timestamp(0) without time zone,
    delivered_at timestamp(0) without time zone,
    cancelled_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.orders OWNER TO postgres;

--
-- TOC entry 239 (class 1259 OID 629359)
-- Name: orders_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.orders_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.orders_id_seq OWNER TO postgres;

--
-- TOC entry 5127 (class 0 OID 0)
-- Dependencies: 239
-- Name: orders_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.orders_id_seq OWNED BY public.orders.id;


--
-- TOC entry 240 (class 1259 OID 629360)
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_reset_tokens OWNER TO postgres;

--
-- TOC entry 241 (class 1259 OID 629365)
-- Name: personal_access_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name text NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.personal_access_tokens OWNER TO postgres;

--
-- TOC entry 242 (class 1259 OID 629370)
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.personal_access_tokens_id_seq OWNER TO postgres;

--
-- TOC entry 5128 (class 0 OID 0)
-- Dependencies: 242
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;


--
-- TOC entry 243 (class 1259 OID 629371)
-- Name: properties; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.properties (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    price numeric(12,2) NOT NULL,
    bedrooms integer,
    bathrooms integer,
    sqft integer,
    address text NOT NULL,
    image_url character varying(255),
    tag character varying(255),
    status character varying(255) NOT NULL,
    agent_name character varying(255),
    mls_id character varying(255),
    property_type character varying(255) DEFAULT 'Residential'::character varying NOT NULL,
    description text,
    is_featured boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    user_id bigint,
    listing_type character varying(255),
    price_type character varying(255),
    city character varying(255),
    state character varying(255),
    zip_code character varying(255),
    country character varying(255),
    latitude numeric(10,8),
    longitude numeric(11,8),
    owner_nida character varying(255),
    title_deed_document character varying(255),
    sales_agreement_document character varying(255),
    owner_phone character varying(255),
    owner_email character varying(255),
    verification_status character varying(255) DEFAULT 'pending'::character varying NOT NULL,
    verification_notes text,
    agent_id bigint,
    CONSTRAINT properties_status_check CHECK (((status)::text = ANY (ARRAY[('Active'::character varying)::text, ('Pending'::character varying)::text, ('Sold'::character varying)::text, ('Rented'::character varying)::text]))),
    CONSTRAINT properties_tag_check CHECK (((tag)::text = ANY (ARRAY[('New Listing'::character varying)::text, ('Price Reduced'::character varying)::text, ('Featured'::character varying)::text, ('Great Value'::character varying)::text])))
);


ALTER TABLE public.properties OWNER TO postgres;

--
-- TOC entry 244 (class 1259 OID 629381)
-- Name: properties_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.properties_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.properties_id_seq OWNER TO postgres;

--
-- TOC entry 5129 (class 0 OID 0)
-- Dependencies: 244
-- Name: properties_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.properties_id_seq OWNED BY public.properties.id;


--
-- TOC entry 245 (class 1259 OID 629382)
-- Name: property_images; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.property_images (
    id bigint NOT NULL,
    property_id bigint NOT NULL,
    image_path character varying(255) NOT NULL,
    image_type character varying(255) DEFAULT 'gallery'::character varying NOT NULL,
    sort_order integer DEFAULT 0 NOT NULL,
    is_primary boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.property_images OWNER TO postgres;

--
-- TOC entry 246 (class 1259 OID 629390)
-- Name: property_images_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.property_images_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.property_images_id_seq OWNER TO postgres;

--
-- TOC entry 5130 (class 0 OID 0)
-- Dependencies: 246
-- Name: property_images_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.property_images_id_seq OWNED BY public.property_images.id;


--
-- TOC entry 247 (class 1259 OID 629391)
-- Name: rental_applications; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.rental_applications (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    property_id bigint NOT NULL,
    applicant_name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    phone character varying(255) NOT NULL,
    monthly_income numeric(15,2) NOT NULL,
    employment_status character varying(255) NOT NULL,
    employer character varying(255) NOT NULL,
    credit_score integer,
    "references" integer DEFAULT 0 NOT NULL,
    desired_move_in date NOT NULL,
    message text,
    status character varying(255) DEFAULT 'pending'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.rental_applications OWNER TO postgres;

--
-- TOC entry 248 (class 1259 OID 629398)
-- Name: rental_applications_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.rental_applications_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.rental_applications_id_seq OWNER TO postgres;

--
-- TOC entry 5131 (class 0 OID 0)
-- Dependencies: 248
-- Name: rental_applications_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.rental_applications_id_seq OWNED BY public.rental_applications.id;


--
-- TOC entry 249 (class 1259 OID 629399)
-- Name: rentals; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.rentals (
    id bigint NOT NULL,
    landlord_id bigint NOT NULL,
    property_id bigint NOT NULL,
    tenant_id bigint,
    monthly_rent numeric(12,2) NOT NULL,
    lease_start_date date,
    lease_end_date date,
    security_deposit numeric(12,2),
    status character varying(255) DEFAULT 'Available'::character varying NOT NULL,
    terms text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.rentals OWNER TO postgres;

--
-- TOC entry 250 (class 1259 OID 629405)
-- Name: rentals_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.rentals_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.rentals_id_seq OWNER TO postgres;

--
-- TOC entry 5132 (class 0 OID 0)
-- Dependencies: 250
-- Name: rentals_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.rentals_id_seq OWNED BY public.rentals.id;


--
-- TOC entry 251 (class 1259 OID 629406)
-- Name: services; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.services (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    description text NOT NULL,
    icon character varying(255),
    image character varying(255),
    category character varying(255),
    price numeric(12,2),
    price_type character varying(255) DEFAULT 'fixed'::character varying NOT NULL,
    contact_name character varying(255),
    contact_phone character varying(255),
    contact_email character varying(255),
    features text,
    is_active boolean DEFAULT true NOT NULL,
    display_order integer DEFAULT 0 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.services OWNER TO postgres;

--
-- TOC entry 252 (class 1259 OID 629414)
-- Name: services_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.services_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.services_id_seq OWNER TO postgres;

--
-- TOC entry 5133 (class 0 OID 0)
-- Dependencies: 252
-- Name: services_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.services_id_seq OWNED BY public.services.id;


--
-- TOC entry 253 (class 1259 OID 629415)
-- Name: sessions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);


ALTER TABLE public.sessions OWNER TO postgres;

--
-- TOC entry 254 (class 1259 OID 629420)
-- Name: support_messages; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.support_messages (
    id bigint NOT NULL,
    ticket_id bigint NOT NULL,
    user_id bigint NOT NULL,
    message text NOT NULL,
    attachment character varying(255),
    is_admin boolean DEFAULT false NOT NULL,
    read_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.support_messages OWNER TO postgres;

--
-- TOC entry 255 (class 1259 OID 629426)
-- Name: support_messages_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.support_messages_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.support_messages_id_seq OWNER TO postgres;

--
-- TOC entry 5134 (class 0 OID 0)
-- Dependencies: 255
-- Name: support_messages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.support_messages_id_seq OWNED BY public.support_messages.id;


--
-- TOC entry 256 (class 1259 OID 629427)
-- Name: support_tickets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.support_tickets (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    ticket_number character varying(255) NOT NULL,
    subject character varying(255) NOT NULL,
    category character varying(255) DEFAULT 'general'::character varying NOT NULL,
    priority character varying(255) DEFAULT 'normal'::character varying NOT NULL,
    status character varying(255) DEFAULT 'open'::character varying NOT NULL,
    assigned_to bigint,
    last_reply_at timestamp(0) without time zone,
    closed_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.support_tickets OWNER TO postgres;

--
-- TOC entry 257 (class 1259 OID 629435)
-- Name: support_tickets_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.support_tickets_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.support_tickets_id_seq OWNER TO postgres;

--
-- TOC entry 5135 (class 0 OID 0)
-- Dependencies: 257
-- Name: support_tickets_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.support_tickets_id_seq OWNED BY public.support_tickets.id;


--
-- TOC entry 258 (class 1259 OID 629436)
-- Name: tenants; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tenants (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    property_id bigint NOT NULL,
    rental_application_id bigint,
    lease_start date NOT NULL,
    lease_end date NOT NULL,
    rent_amount numeric(15,2) NOT NULL,
    payment_status character varying(255) DEFAULT 'unpaid'::character varying NOT NULL,
    status character varying(255) DEFAULT 'active'::character varying NOT NULL,
    emergency_contact character varying(255),
    notes text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.tenants OWNER TO postgres;

--
-- TOC entry 259 (class 1259 OID 629443)
-- Name: tenants_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tenants_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.tenants_id_seq OWNER TO postgres;

--
-- TOC entry 5136 (class 0 OID 0)
-- Dependencies: 259
-- Name: tenants_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tenants_id_seq OWNED BY public.tenants.id;


--
-- TOC entry 260 (class 1259 OID 629444)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    current_team_id bigint,
    profile_photo_path character varying(2048),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    two_factor_secret text,
    two_factor_recovery_codes text,
    two_factor_confirmed_at timestamp(0) without time zone,
    user_type character varying(255) DEFAULT 'seller'::character varying NOT NULL,
    business_type character varying(255),
    nida_document character varying(255),
    passport_document character varying(255),
    business_license character varying(255),
    certificate_of_incorporation character varying(255),
    tax_clearance_certificate character varying(255),
    memorandum_of_association character varying(255),
    articles_of_association character varying(255),
    board_resolution character varying(255),
    proof_of_address character varying(255),
    bank_statement character varying(255),
    kyc_status character varying(255) DEFAULT 'pending'::character varying NOT NULL,
    kyc_notes text,
    CONSTRAINT users_user_type_check CHECK (((user_type)::text = ANY (ARRAY[('seller'::character varying)::text, ('supplier'::character varying)::text, ('landlord'::character varying)::text, ('savanna'::character varying)::text, ('agent'::character varying)::text])))
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 261 (class 1259 OID 629452)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 5137 (class 0 OID 0)
-- Dependencies: 261
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 4756 (class 2604 OID 629453)
-- Name: banks id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.banks ALTER COLUMN id SET DEFAULT nextval('public.banks_id_seq'::regclass);


--
-- TOC entry 4758 (class 2604 OID 629454)
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- TOC entry 4760 (class 2604 OID 629455)
-- Name: financing_inquiries id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.financing_inquiries ALTER COLUMN id SET DEFAULT nextval('public.financing_inquiries_id_seq'::regclass);


--
-- TOC entry 4762 (class 2604 OID 629456)
-- Name: inquiries id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.inquiries ALTER COLUMN id SET DEFAULT nextval('public.inquiries_id_seq'::regclass);


--
-- TOC entry 4765 (class 2604 OID 629457)
-- Name: jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs ALTER COLUMN id SET DEFAULT nextval('public.jobs_id_seq'::regclass);


--
-- TOC entry 4766 (class 2604 OID 629458)
-- Name: loan_products id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.loan_products ALTER COLUMN id SET DEFAULT nextval('public.loan_products_id_seq'::regclass);


--
-- TOC entry 4769 (class 2604 OID 629459)
-- Name: materials id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.materials ALTER COLUMN id SET DEFAULT nextval('public.materials_id_seq'::regclass);


--
-- TOC entry 4777 (class 2604 OID 629460)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 4778 (class 2604 OID 629461)
-- Name: order_items id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_items ALTER COLUMN id SET DEFAULT nextval('public.order_items_id_seq'::regclass);


--
-- TOC entry 4779 (class 2604 OID 629462)
-- Name: orders id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders ALTER COLUMN id SET DEFAULT nextval('public.orders_id_seq'::regclass);


--
-- TOC entry 4784 (class 2604 OID 629463)
-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);


--
-- TOC entry 4785 (class 2604 OID 629464)
-- Name: properties id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.properties ALTER COLUMN id SET DEFAULT nextval('public.properties_id_seq'::regclass);


--
-- TOC entry 4789 (class 2604 OID 629465)
-- Name: property_images id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.property_images ALTER COLUMN id SET DEFAULT nextval('public.property_images_id_seq'::regclass);


--
-- TOC entry 4793 (class 2604 OID 629466)
-- Name: rental_applications id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rental_applications ALTER COLUMN id SET DEFAULT nextval('public.rental_applications_id_seq'::regclass);


--
-- TOC entry 4796 (class 2604 OID 629467)
-- Name: rentals id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rentals ALTER COLUMN id SET DEFAULT nextval('public.rentals_id_seq'::regclass);


--
-- TOC entry 4798 (class 2604 OID 629468)
-- Name: services id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.services ALTER COLUMN id SET DEFAULT nextval('public.services_id_seq'::regclass);


--
-- TOC entry 4802 (class 2604 OID 629469)
-- Name: support_messages id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.support_messages ALTER COLUMN id SET DEFAULT nextval('public.support_messages_id_seq'::regclass);


--
-- TOC entry 4804 (class 2604 OID 629470)
-- Name: support_tickets id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.support_tickets ALTER COLUMN id SET DEFAULT nextval('public.support_tickets_id_seq'::regclass);


--
-- TOC entry 4808 (class 2604 OID 629471)
-- Name: tenants id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tenants ALTER COLUMN id SET DEFAULT nextval('public.tenants_id_seq'::regclass);


--
-- TOC entry 4811 (class 2604 OID 629472)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 5067 (class 0 OID 629269)
-- Dependencies: 217
-- Data for Name: banks; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.banks (id, name, short_name, logo, description, website, phone, email, is_active, created_at, updated_at) FROM stdin;
1	CRDB Bank PLC	CRDB	\N	Cooperative and Rural Development Bank - Tanzania's largest bank by customer base	https://www.crdbbank.co.tz	+255 22 211 7700	info@crdbbank.com	t	2025-10-19 15:53:58	2025-10-19 15:53:58
2	National Microfinance Bank (NMB)	NMB	\N	Leading retail bank in Tanzania with extensive branch network	https://www.nmbbank.co.tz	+255 22 260 3303	customercare@nmbtz.com	t	2025-10-19 15:53:58	2025-10-19 15:53:58
3	Stanbic Bank Tanzania	Stanbic	\N	Part of Standard Bank Group, offering comprehensive banking solutions	https://www.stanbicbank.co.tz	+255 22 209 1000	customercare@stanbic.com	t	2025-10-19 15:53:58	2025-10-19 15:53:58
4	Standard Chartered Bank Tanzania	SCB	\N	International bank with strong presence in Tanzania	https://www.sc.com/tz	+255 22 213 4400	tanzania.queries@sc.com	t	2025-10-19 15:53:58	2025-10-19 15:53:58
5	Exim Bank Tanzania	Exim	\N	Export-Import Bank specializing in trade finance	https://www.eximbank-tz.com	+255 22 213 1616	info@eximbank-tz.com	t	2025-10-19 15:53:58	2025-10-19 15:53:58
6	Bank of Africa Tanzania (BOA)	BOA	\N	Pan-African bank providing diverse financial services	https://www.boa.co.tz	+255 22 260 1900	info@boa.co.tz	t	2025-10-19 15:53:58	2025-10-19 15:53:58
7	Absa Bank Tanzania	Absa	\N	Formerly Barclays Bank, now part of Absa Group	https://www.absa.africa/tanzania	+255 22 223 4000	customercare.tanzania@absa.africa	t	2025-10-19 15:53:58	2025-10-19 15:53:58
8	Azania Bank Limited	Azania	\N	Tanzanian bank focused on retail and corporate banking	https://www.azaniabank.co.tz	+255 22 260 0300	info@azaniabank.co.tz	t	2025-10-19 15:53:58	2025-10-19 15:53:58
9	Tanzania Commercial Bank (TCB)	TCB	\N	Government-owned commercial bank	https://www.tcb.co.tz	+255 22 219 6200	info@tcb.co.tz	t	2025-10-19 15:53:58	2025-10-19 15:53:58
10	DTB Tanzania	DTB	\N	Diamond Trust Bank - Regional bank with strong presence	https://www.dtbafrica.com/tanzania	+255 22 223 4500	customercare@dtbafrica.com	t	2025-10-19 15:53:58	2025-10-19 15:53:58
\.


--
-- TOC entry 5069 (class 0 OID 629276)
-- Dependencies: 219
-- Data for Name: cache; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cache (key, value, expiration) FROM stdin;
laravel-cache-1b6453892473a467d07372d45eb05abc2031647a:timer	i:1760885696;	1760885696
laravel-cache-1b6453892473a467d07372d45eb05abc2031647a	i:1;	1760885696
\.


--
-- TOC entry 5070 (class 0 OID 629281)
-- Dependencies: 220
-- Data for Name: cache_locks; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cache_locks (key, owner, expiration) FROM stdin;
\.


--
-- TOC entry 5071 (class 0 OID 629286)
-- Dependencies: 221
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- TOC entry 5073 (class 0 OID 629293)
-- Dependencies: 223
-- Data for Name: financing_inquiries; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.financing_inquiries (id, user_id, property_id, loan_product_id, full_name, email, phone, monthly_income, employment_status, loan_amount, loan_tenure_months, additional_info, status, admin_notes, created_at, updated_at) FROM stdin;
1	4	24	6	Savanna System Manager	savanna@example.com	0692410353	234535555.00	Employed Full-Time	36000000.00	60	fgdfgfhgfhfgh	pending	\N	2025-10-19 16:34:21	2025-10-19 16:34:21
2	4	24	2	Savanna System Manager	savanna@example.com	0692410353	56675765.00	Employed Part-Time	36000000.00	60	ghfgfghf	pending	\N	2025-10-20 12:00:13	2025-10-20 12:00:13
\.


--
-- TOC entry 5075 (class 0 OID 629300)
-- Dependencies: 225
-- Data for Name: inquiries; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.inquiries (id, from_user_id, to_user_id, property_id, subject, message, status, priority, contact_email, contact_phone, read_at, replied_at, created_at, updated_at) FROM stdin;
1	4	4	24	Error velit qui dol	Enim rerum reiciendi	replied	normal	muxyhu@mailinator.com	+1 (205) 745-3031	2025-10-19 05:50:47	2025-10-19 06:01:24	2025-10-19 05:38:31	2025-10-19 06:01:24
2	4	4	24	Financing Inquiry: Consequat Dolores d	A user has submitted a financing inquiry for your property.\n\nProperty: Consequat Dolores d\nLoan Product: SCB Mortgage Solution (Standard Chartered Bank Tanzania)\nLoan Amount: TZS 36,000,000\nTenure: 60 months\n\nApplicant: Savanna System Manager\nEmail: savanna@example.com\nPhone: 0692410353	new	high	savanna@example.com	0692410353	\N	\N	2025-10-19 16:34:21	2025-10-19 16:34:21
3	4	4	24	New Financing Application	A new financing inquiry has been submitted.\n\nProperty: Consequat Dolores d\nSeller: Savanna System Manager\nLoan Product: SCB Mortgage Solution (Standard Chartered Bank Tanzania)\nLoan Amount: TZS 36,000,000\nTenure: 60 months\n\nApplicant: Savanna System Manager\nEmail: savanna@example.com\nPhone: 0692410353\nMonthly Income: TZS 234,535,555\nEmployment: Employed Full-Time	new	high	savanna@example.com	0692410353	\N	\N	2025-10-19 16:34:21	2025-10-19 16:34:21
4	4	4	24	Inquiry about: Consequat Dolores d	abcd	new	normal	savanna@example.com	76876786786	\N	\N	2025-10-20 11:51:37	2025-10-20 11:51:37
5	4	4	24	Financing Inquiry: Consequat Dolores d	A user has submitted a financing inquiry for your property.\n\nProperty: Consequat Dolores d\nLoan Product: CRDB Mortgage Plus (CRDB Bank PLC)\nLoan Amount: TZS 36,000,000\nTenure: 60 months\n\nApplicant: Savanna System Manager\nEmail: savanna@example.com\nPhone: 0692410353	new	high	savanna@example.com	0692410353	\N	\N	2025-10-20 12:00:13	2025-10-20 12:00:13
6	4	4	24	New Financing Application	A new financing inquiry has been submitted.\n\nProperty: Consequat Dolores d\nSeller: Savanna System Manager\nLoan Product: CRDB Mortgage Plus (CRDB Bank PLC)\nLoan Amount: TZS 36,000,000\nTenure: 60 months\n\nApplicant: Savanna System Manager\nEmail: savanna@example.com\nPhone: 0692410353\nMonthly Income: TZS 56,675,765\nEmployment: Employed Part-Time	new	high	savanna@example.com	0692410353	\N	\N	2025-10-20 12:00:13	2025-10-20 12:00:13
\.


--
-- TOC entry 5077 (class 0 OID 629308)
-- Dependencies: 227
-- Data for Name: job_batches; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.job_batches (id, name, total_jobs, pending_jobs, failed_jobs, failed_job_ids, options, cancelled_at, created_at, finished_at) FROM stdin;
\.


--
-- TOC entry 5078 (class 0 OID 629313)
-- Dependencies: 228
-- Data for Name: jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.jobs (id, queue, payload, attempts, reserved_at, available_at, created_at) FROM stdin;
\.


--
-- TOC entry 5080 (class 0 OID 629319)
-- Dependencies: 230
-- Data for Name: loan_products; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.loan_products (id, bank_id, name, description, interest_rate, min_tenure_months, max_tenure_months, min_amount, max_amount, processing_fee_percentage, requirements, features, is_active, created_at, updated_at) FROM stdin;
1	1	CRDB Home Loan	Affordable home financing solution with flexible repayment terms	14.50	12	300	10000000.00	500000000.00	1.50	Valid ID, Proof of income, Property valuation, Title deed	Up to 90% financing, Flexible repayment, Low interest rates	t	2025-10-19 15:54:04	2025-10-19 15:54:04
2	1	CRDB Mortgage Plus	Premium mortgage product for high-value properties	13.00	24	360	50000000.00	1000000000.00	1.00	Valid ID, Bank statements (6 months), Property documents, Collateral	Competitive rates, Up to 85% LTV, Grace period available	t	2025-10-19 15:54:04	2025-10-19 15:54:04
3	2	NMB Nyumba Yangu	Your dream home financing made easy	15.00	12	240	5000000.00	300000000.00	2.00	NIDA, Payslips (3 months), Property valuation report	Quick approval, Flexible terms, No hidden charges	t	2025-10-19 15:54:04	2025-10-19 15:54:04
4	2	NMB Property Finance	Comprehensive property financing for individuals and businesses	14.00	24	300	20000000.00	800000000.00	1.50	Business plan (for commercial), Financial statements, Title deed, Insurance	Up to 80% financing, Tailored solutions, Dedicated relationship manager	t	2025-10-19 15:54:04	2025-10-19 15:54:04
5	3	Stanbic Home Advantage	Competitive home loan with attractive rates	13.50	12	360	15000000.00	600000000.00	1.20	ID verification, Income proof, Property documents, Credit check	Low interest rates, Flexible repayment, Free property valuation	t	2025-10-19 15:54:04	2025-10-19 15:54:04
6	4	SCB Mortgage Solution	International standard mortgage financing	12.50	24	300	30000000.00	1500000000.00	1.00	Valid passport/ID, Bank statements (6 months), Property valuation, Legal documents	Premium rates, Global expertise, Personalized service	t	2025-10-19 15:54:04	2025-10-19 15:54:04
7	5	Exim Property Loan	Specialized financing for property acquisition	15.50	12	180	10000000.00	400000000.00	2.00	NIDA/Passport, Employment letter, Property documentation	Fast processing, Competitive rates, Flexible terms	t	2025-10-19 15:54:04	2025-10-19 15:54:04
8	6	BOA Home Finance	Pan-African mortgage solution	14.00	24	240	20000000.00	500000000.00	1.50	Valid ID, Salary slips, Property title, Bank statements	Regional expertise, Competitive pricing, Quick turnaround	t	2025-10-19 15:54:04	2025-10-19 15:54:04
9	7	Absa Home Loan	Trusted home financing from Absa	13.75	12	300	15000000.00	700000000.00	1.30	ID, Proof of income, Property valuation, Credit history	Trusted brand, Flexible options, Expert advice	t	2025-10-19 15:54:04	2025-10-19 15:54:04
10	8	Azania Nyumba Loan	Local bank home financing solution	16.00	12	200	5000000.00	250000000.00	2.50	NIDA, Employment details, Property documents	Local understanding, Personalized service, Quick decisions	t	2025-10-19 15:54:04	2025-10-19 15:54:04
\.


--
-- TOC entry 5082 (class 0 OID 629327)
-- Dependencies: 232
-- Data for Name: materials; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.materials (id, name, description, price, sku, category, brand, image_url, stock_quantity, unit, specifications, is_featured, is_available, discount_percentage, supplier_name, created_at, updated_at, images, min_stock_level, owner_nida, business_license_document, supplier_certificate, owner_phone, owner_email, verification_status, verification_notes) FROM stdin;
7	Distinctio Sequi mo	Tempora sunt volupt	245454.00	Id consequuntur aut 	Bricks	In aliquam dolore ma	product-images/qv0a1u5ivIdB5C2BZCTaccNDWBfnUP4vZJiXuoLA.jpg	64	kg	\N	f	t	49.00	Non minus inventore 	2025-10-17 15:50:18	2025-10-17 15:50:18	"[\\"product-images\\\\\\/qv0a1u5ivIdB5C2BZCTaccNDWBfnUP4vZJiXuoLA.jpg\\",\\"product-images\\\\\\/RcRC8NxGf2ZsFKi69Pa2CT1HrkmUxKlA2WCmlsGE.jpg\\"]"	75	\N	\N	\N	\N	\N	pending	\N
8	Placeat molestiae q	Cillum est dolor en	647777.00	Doloribus elit cons	Bricks	Suscipit placeat re	product-images/bLRMAW1jbF9AO4wZhCXFTZUIa3QsoeOskjILndkm.jpg	85	piece	\N	f	f	87.00	Eum ex sed voluptate	2025-10-17 15:50:32	2025-10-17 15:50:32	"[\\"product-images\\\\\\/bLRMAW1jbF9AO4wZhCXFTZUIa3QsoeOskjILndkm.jpg\\"]"	63	\N	\N	\N	\N	\N	pending	\N
10	Ullamco qui tempora 	Veritatis aute delec	46000.00	Qui aliquam tempora 	Cement	Obcaecati excepteur 	product-images/KkcjpYAoOg4pzQJm1LazYt14vaCT9v280EVoAvPb.jpg	86	box	\N	f	f	1.00	Repudiandae dolore d	2025-10-17 16:15:17	2025-10-17 16:15:17	"[\\"product-images\\\\\\/KkcjpYAoOg4pzQJm1LazYt14vaCT9v280EVoAvPb.jpg\\",\\"product-images\\\\\\/w7JETsAqwndgvuFTm680Q1GUauNzVYjCphk5v7sF.jpg\\"]"	75	\N	\N	\N	\N	\N	pending	\N
11	Et sapiente cum dign	Voluptatem officiis	30.00	Omnis officia suscip	Lumber	Voluptatem qui ut a	product-images/IcD97qiPbcukKGwVqaBDlUh6vLBkucCkoqWjna4u.jpg	82	meter	\N	t	f	63.00	Quis alias quis et e	2025-10-17 16:15:56	2025-10-20 13:26:17	"[\\"product-images\\\\\\/IcD97qiPbcukKGwVqaBDlUh6vLBkucCkoqWjna4u.jpg\\"]"	40	\N	\N	\N	\N	\N	pending	\N
6	In impedit enim iur	Et duis repellendus	3500000.00	Adipisci aspernatur 	Tiles	Voluptatem pariatur	product-images/mvRedx646TfO8jETPIv5DSRgT2Tx8fHmKGJoJbQl.jpg	37	liter	\N	t	f	89.00	Et quam vel quasi am	2025-10-17 15:50:02	2025-10-20 13:26:37	"[\\"product-images\\\\\\/mvRedx646TfO8jETPIv5DSRgT2Tx8fHmKGJoJbQl.jpg\\",\\"product-images\\\\\\/zjpXHut6r6ySbuCSGc9wqO5EHEfXbvP9zZSL9kpf.jpg\\"]"	100	\N	\N	\N	\N	\N	pending	\N
9	Cillum cumque ducimu	Doloribus aute asper	760000.00	Dolore voluptate sun	Plumbing	Ipsum sed et id labo	product-images/11DZgr2mnjKvAWpeNl6ZzJJTdoc7HB2zZwt3ZsAU.jpg	45	piece	\N	t	t	1.00	Ea omnis voluptatibu	2025-10-17 16:14:58	2025-10-20 13:26:13	"[\\"product-images\\\\\\/11DZgr2mnjKvAWpeNl6ZzJJTdoc7HB2zZwt3ZsAU.jpg\\",\\"product-images\\\\\\/WL3WoHTkThi2mGJnVGv0WXwW1nZU4xlMZNtU98ef.jpg\\",\\"product-images\\\\\\/4rMpmQr1LmgO0UdnZlkbWl5xdqDlQ3Mbk2UrkOJ2.jpg\\"]"	16	\N	\N	\N	\N	\N	pending	\N
\.


--
-- TOC entry 5084 (class 0 OID 629340)
-- Dependencies: 234
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
17	0001_01_01_000000_create_users_table	1
18	0001_01_01_000001_create_cache_table	1
19	0001_01_01_000002_create_jobs_table	1
20	2025_10_13_233106_add_two_factor_columns_to_users_table	1
21	2025_10_13_233122_create_personal_access_tokens_table	1
22	2025_10_16_134548_create_properties_table	1
23	2025_10_17_045410_create_materials_table	1
24	2025_10_17_104808_add_user_type_to_users_table	1
25	2025_10_17_140816_add_images_to_materials_table	2
26	2025_10_17_142905_update_properties_table_make_fields_nullable	3
27	2025_10_17_143547_add_user_id_and_location_fields_to_properties_table	4
28	2025_10_17_143816_create_property_images_table	5
29	2025_10_17_145233_create_rentals_table	6
30	2025_10_19_052214_create_inquiries_table	7
31	2025_10_19_062545_create_orders_table	8
32	2025_10_19_062552_create_order_items_table	9
33	2025_10_19_115616_create_rental_applications_table	10
34	2025_10_19_121819_create_tenants_table	11
35	2025_10_19_130249_add_ownership_proof_to_properties_table	12
36	2025_10_19_134300_add_ownership_proof_to_materials_table	13
37	2025_10_19_140034_add_business_type_to_users_table	14
38	2025_10_19_142158_add_kyc_documents_to_users_table	15
39	2025_10_19_145945_create_support_tickets_table	16
40	2025_10_19_145953_create_support_messages_table	17
41	2025_10_19_155126_create_banks_table	18
42	2025_10_19_155132_create_loan_products_table	19
43	2025_10_19_155139_create_financing_inquiries_table	20
44	2025_10_19_170353_create_services_table	21
\.


--
-- TOC entry 5086 (class 0 OID 629344)
-- Dependencies: 236
-- Data for Name: order_items; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.order_items (id, order_id, material_id, product_name, product_sku, price, quantity, subtotal, created_at, updated_at) FROM stdin;
1	1	11	Et sapiente cum dign	Omnis officia suscip	30.00	2	60.00	2025-10-19 07:23:00	2025-10-19 07:23:00
2	1	10	Ullamco qui tempora 	Qui aliquam tempora 	46000.00	3	138000.00	2025-10-19 07:23:00	2025-10-19 07:23:00
3	1	9	Cillum cumque ducimu	Dolore voluptate sun	760000.00	2	1520000.00	2025-10-19 07:23:00	2025-10-19 07:23:00
4	1	8	Placeat molestiae q	Doloribus elit cons	647777.00	1	647777.00	2025-10-19 07:23:00	2025-10-19 07:23:00
5	1	6	In impedit enim iur	Adipisci aspernatur 	3500000.00	1	3500000.00	2025-10-19 07:23:00	2025-10-19 07:23:00
6	2	9	Cillum cumque ducimu	Dolore voluptate sun	760000.00	1	760000.00	2025-10-19 08:53:12	2025-10-19 08:53:12
7	2	11	Et sapiente cum dign	Omnis officia suscip	30.00	1	30.00	2025-10-19 08:53:12	2025-10-19 08:53:12
8	5	11	Et sapiente cum dign	Omnis officia suscip	30.00	4	120.00	2025-10-20 13:09:23	2025-10-20 13:09:23
\.


--
-- TOC entry 5088 (class 0 OID 629350)
-- Dependencies: 238
-- Data for Name: orders; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.orders (id, order_number, buyer_id, supplier_id, subtotal, tax, shipping_fee, total, status, payment_status, payment_method, shipping_address, billing_address, notes, paid_at, shipped_at, delivered_at, cancelled_at, created_at, updated_at) FROM stdin;
2	ORD-68F4A6F8585B6	4	\N	760030.00	136805.40	5000.00	901835.40	delivered	unpaid	cash	Cumque voluptate lab	Corporis laboris qua	Et omnis minim culpa	\N	\N	\N	\N	2025-10-19 08:53:12	2025-10-19 08:54:01
1	ORD-68F491D4A675F	4	\N	5805837.00	1045050.66	5000.00	6855887.66	delivered	unpaid	bank_transfer	Omnis a atque aliqui	Sint minus id liber	Sed ea sed ipsum si	\N	\N	\N	\N	2025-10-19 07:23:00	2025-10-19 08:54:06
3	ORD-TEST-LIPA	4	\N	100000.00	18000.00	5000.00	123000.00	pending	pending_verification	lipa_namba	Test Address	\N	Lipa Namba Reference: ABC123XYZ456	\N	\N	\N	\N	2025-10-19 11:55:20	2025-10-19 11:55:20
4	ORD-TEST-CASH	4	\N	50000.00	9000.00	5000.00	64000.00	pending	unpaid	cash	Test Address 2	\N	Customer will pay on delivery	\N	\N	\N	\N	2025-10-19 11:55:32	2025-10-19 11:55:32
5	ORD-68F63483A964E	4	\N	120.00	21.60	5000.00	5141.60	delivered	unpaid	cash	Vel iusto at qui in 	Ut odio voluptate co	Laudantium voluptat	\N	\N	\N	\N	2025-10-20 13:09:23	2025-10-20 13:13:14
\.


--
-- TOC entry 5090 (class 0 OID 629360)
-- Dependencies: 240
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
\.


--
-- TOC entry 5091 (class 0 OID 629365)
-- Dependencies: 241
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 5093 (class 0 OID 629371)
-- Dependencies: 243
-- Data for Name: properties; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.properties (id, title, price, bedrooms, bathrooms, sqft, address, image_url, tag, status, agent_name, mls_id, property_type, description, is_featured, created_at, updated_at, user_id, listing_type, price_type, city, state, zip_code, country, latitude, longitude, owner_nida, title_deed_document, sales_agreement_document, owner_phone, owner_email, verification_status, verification_notes, agent_id) FROM stdin;
24	Consequat Dolores d	45000000.00	60	97	68	Ut ad ipsam sunt qu	\N	\N	Active	\N	\N	residential	Reprehenderit quibu	f	2025-10-17 16:18:35	2025-10-17 16:18:35	4	both	negotiable	Soluta doloribus fac	Porro dolorem culpa	Ullamco aut placeat	Ea culpa dignissimo	57.00000000	68.00000000	\N	\N	\N	\N	\N	pending	\N	\N
25	Aut ea rerum omnis l	57.00	1	62	18	Recusandae Nisi mol	\N	\N	Sold	\N	\N	residential	Labore dolore in lib	t	2025-10-22 08:26:56	2025-10-22 08:28:07	7	sale	fixed	Eum est nihil impedi	Possimus aut et aut	Soluta sed itaque cu	Ducimus exercitatio	37.00000000	12.00000000	Reprehenderit ipsa	\N	\N	Voluptatem voluptat	kysipyfi@mailinator.com	pending	\N	\N
10	Nyumba ya Kupanga Oysterbay	449683.00	13	13	21	Laudantium officiis	\N	\N	Pending	\N	\N	land	Sed culpa quis dolor	f	2025-10-17 15:28:44	2025-10-17 15:28:44	4	rent	auction	Est aut numquam quod	Temporibus consequat	Nobis aut unde deser	Ab aspernatur volupt	23.00000000	88.00000000	\N	\N	\N	\N	\N	pending	\N	8
12	Chumba cha Kulala Masaki	338625.00	54	84	51	Qui voluptatem volu	\N	\N	Active	\N	\N	commercial	Voluptas similique a	f	2025-10-17 15:29:14	2025-10-17 15:29:14	4	both	negotiable	Eum earum eligendi s	Iste repellendus De	Est hic proident i	Nostrum adipisci deb	88.00000000	81.00000000	\N	\N	\N	\N	\N	pending	\N	8
15	Ofisi za Kibiashara Kariakoo	449814.00	98	91	79	Quae quos provident	\N	\N	Active	\N	\N	industrial	Et asperiores illo e	f	2025-10-17 15:30:45	2025-10-17 15:30:45	4	both	negotiable	Quam exercitation do	Perferendis suscipit	Sunt minima aut cumq	Sit ad autem velit o	79.00000000	6.00000000	\N	\N	\N	\N	\N	pending	\N	8
18	Apartment Msasani	448246.00	3	64	50	Et illum ut alias a	\N	\N	Active	\N	\N	commercial	Omnis ut consequatur	t	2025-10-17 15:37:57	2025-10-17 15:37:57	4	rent	fixed	Est in omnis nesciun	Dolore unde voluptat	Dolor debitis ipsum	Eiusmod ad deleniti 	82.00000000	97.00000000	\N	\N	\N	\N	\N	pending	\N	8
20	Ghorofa Upanga	420739.00	13	92	41	Repellendus Sit nis	\N	\N	Pending	\N	\N	commercial	Totam anim eveniet 	f	2025-10-17 15:39:53	2025-10-17 15:39:53	4	both	fixed	Officiis quasi qui u	Doloremque tempore 	Libero pariatur Pra	Quod quis quia repel	16.00000000	58.00000000	\N	\N	\N	\N	\N	pending	\N	8
22	Jengo la Makazi Sinza	106370.00	50	12	66	Possimus minima qua	\N	\N	Pending	\N	\N	commercial	Dolore placeat non 	t	2025-10-17 15:40:30	2025-10-17 15:40:30	4	both	auction	Laboris cum et est 	Quae eaque culpa re	Quas dolore iure fac	Eiusmod consectetur	53.00000000	44.00000000	\N	\N	\N	\N	\N	pending	\N	8
11	Jengo la Biashara Mikocheni	236380.00	82	59	48	Modi sit dolorum di	\N	\N	Active	\N	\N	industrial	Voluptas quod tempor	f	2025-10-17 15:28:59	2025-10-17 15:28:59	4	both	negotiable	Cumque blanditiis of	Quo ex explicabo Al	Quos vitae labore el	Mollitia consequatur	23.00000000	98.00000000	\N	\N	\N	\N	\N	pending	\N	\N
13	Nyumba ya Familia Mbezi Beach	369712.00	56	56	89	Qui aspernatur non m	\N	\N	Active	\N	\N	commercial	Nihil eum eius delen	f	2025-10-17 15:29:50	2025-10-17 15:29:50	4	both	auction	Ullam praesentium qu	Vel nihil culpa fugi	Aut ad earum eu maxi	Ut atque nisi simili	23.00000000	75.00000000	\N	\N	\N	\N	\N	pending	\N	\N
14	Godown Tabata	6465384.00	66	95	82	Irure rerum dignissi	\N	\N	Active	\N	\N	land	Error sed illum eli	t	2025-10-17 15:30:16	2025-10-17 15:30:16	4	sale	fixed	Obcaecati ipsum cumq	Exercitationem odio 	Sit hic sunt animi	Aut sit quo natus v	49.00000000	29.00000000	\N	\N	\N	\N	\N	pending	\N	\N
16	Fleti ya Kupanga Kinondoni	451573.00	9	10	79	Sunt quia quis aute 	\N	\N	Active	\N	\N	land	Est tempora quasi q	f	2025-10-17 15:36:53	2025-10-17 15:36:53	4	rent	fixed	Blanditiis velit mai	Expedita eos volupt	Cumque aut ea mollit	Est ex sunt offici	65.00000000	47.00000000	\N	\N	\N	\N	\N	pending	\N	\N
17	Nyumba ya Kisasa Mikocheni	350722.00	78	21	66	Sed incididunt sed v	\N	\N	Rented	\N	\N	residential	Aliquip numquam dolo	f	2025-10-17 15:37:10	2025-10-17 15:37:10	4	both	fixed	Adipisci enim molest	Fugiat laboriosam a	Nisi rerum repellend	Debitis ullam aut et	12.00000000	35.00000000	\N	\N	\N	\N	\N	pending	\N	\N
19	Villa ya Kifahari Masaki	2702882.00	12	42	78	Ullamco quos perfere	\N	\N	Active	\N	\N	residential	Mollitia ut laudanti	f	2025-10-17 15:39:30	2025-10-17 15:39:30	4	sale	fixed	Vitae voluptas non e	Quia voluptatem Vol	Sed voluptatibus lib	Ea et voluptatem Pa	1.00000000	77.00000000	\N	\N	\N	\N	\N	pending	\N	\N
21	Nyumba ya Ukoo Tegeta	4594282.00	21	60	82	Consequatur Eos eu	\N	\N	Rented	\N	\N	land	Quia in ad enim null	t	2025-10-17 15:40:13	2025-10-17 15:40:13	4	sale	auction	Dolor quia esse et 	Blanditiis consequat	Omnis nesciunt ut t	Qui in ipsam et veli	13.00000000	68.00000000	\N	\N	\N	\N	\N	pending	\N	\N
23	Fleti Ilala	307432.00	77	74	91	Est a dolore amet d	\N	\N	Active	\N	\N	commercial	Sint est officia m	f	2025-10-17 15:41:01	2025-10-17 15:41:01	4	rent	auction	Minim id sint minim	Voluptatum in ullam 	Quasi sint quas adi	Fugiat omnis praesen	59.00000000	22.00000000	\N	\N	\N	\N	\N	pending	\N	\N
\.


--
-- TOC entry 5095 (class 0 OID 629382)
-- Dependencies: 245
-- Data for Name: property_images; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.property_images (id, property_id, image_path, image_type, sort_order, is_primary, created_at, updated_at) FROM stdin;
17	10	properties/ZbPwRcLqUxBh9k7R4AjyHwRSTeqav4VM4Saofvfz.jpg	main	0	t	2025-10-17 15:28:44	2025-10-17 15:28:44
18	10	properties/Soh9BZhqySRmgEa9hvxX6hacarwVTQ1s7x2vAJ8h.jpg	gallery	1	f	2025-10-17 15:28:44	2025-10-17 15:28:44
19	11	properties/ShGcBX7PtTxiX5bqrUzULymdsDHzyTU5qxXQfZBW.jpg	main	0	t	2025-10-17 15:28:59	2025-10-17 15:28:59
20	12	properties/yE6k3R7Aq4H1uvBFa9yeJkqRgVy9DBnpeKzJlzEf.jpg	main	0	t	2025-10-17 15:29:14	2025-10-17 15:29:14
21	13	properties/uG7nphj0n5ehChadv6go5fWcwdOWPTkD8NXW7uW9.jpg	main	0	t	2025-10-17 15:29:50	2025-10-17 15:29:50
22	14	properties/vSZkDpFtfU1RCS4LxxO1vzGSbcAUzxHQSEQWw1Wu.jpg	main	0	t	2025-10-17 15:30:16	2025-10-17 15:30:16
23	15	properties/ki9hPzxR7z762lfiSfpHQr7ed0TdWfFdza8mJK2N.jpg	main	0	t	2025-10-17 15:30:45	2025-10-17 15:30:45
24	16	properties/zNgZSLoJcDlf7HayPCiqDkeY4NUhydSWawwTBBUs.jpg	main	0	t	2025-10-17 15:36:53	2025-10-17 15:36:53
25	17	properties/erM78iQSxSqONljaQrFzwq7dittuYpTgZKWmzIs4.jpg	main	0	t	2025-10-17 15:37:10	2025-10-17 15:37:10
26	18	properties/HminfCh1uhEpZLGdBIjyOq4zFZZcvgRpc2yp2r1N.jpg	main	0	t	2025-10-17 15:37:57	2025-10-17 15:37:57
27	19	properties/lMhcd2QH1DHdAITDdMdU6oZXStvxAY3rCCBSPUxR.jpg	main	0	t	2025-10-17 15:39:30	2025-10-17 15:39:30
28	20	properties/ErVkKLAA6H84G335KqSM6lw7ac8DFR8ZyuMvhejs.jpg	main	0	t	2025-10-17 15:39:53	2025-10-17 15:39:53
29	21	properties/kzNGi1J13P13XvXwOrxVGaMFwqFucU06m3JXwct2.jpg	main	0	t	2025-10-17 15:40:13	2025-10-17 15:40:13
30	21	properties/CCuj0RluL9ctkUJ5EBZbbadJhbxgj6RTPcgPkqv1.jpg	gallery	1	f	2025-10-17 15:40:13	2025-10-17 15:40:13
31	22	properties/l9VQxCxsoeoQACw0ybynPFaw1B2AFCorFE3oCRwX.jpg	main	0	t	2025-10-17 15:40:30	2025-10-17 15:40:30
32	23	properties/BTCTNjkUdxrfqe1QZKM4sviEIy05A6m6amTn2fbD.jpg	main	0	t	2025-10-17 15:41:01	2025-10-17 15:41:01
33	24	properties/MwGwvCjJBWFktRwhImaTShZ2FJggkkQa5TKFL46C.jpg	main	0	t	2025-10-17 16:18:35	2025-10-17 16:18:35
\.


--
-- TOC entry 5097 (class 0 OID 629391)
-- Dependencies: 247
-- Data for Name: rental_applications; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.rental_applications (id, user_id, property_id, applicant_name, email, phone, monthly_income, employment_status, employer, credit_score, "references", desired_move_in, message, status, created_at, updated_at) FROM stdin;
1	4	24	Possimus sed laboru	hixa@mailinator.com	+1 (517) 108-9377	70.00	Student	Et quod in natus vit	62	53	2025-10-26	Magnam non repudiand	approved	2025-10-19 12:13:01	2025-10-19 12:17:02
2	4	23	Laboris eos ullamco	gizox@mailinator.com	+1 (255) 322-3687	19.00	Employed	Minus minima archite	55	35	2025-10-25	Eum ex vero velit ne	approved	2025-10-19 12:22:16	2025-10-19 12:22:52
\.


--
-- TOC entry 5099 (class 0 OID 629399)
-- Dependencies: 249
-- Data for Name: rentals; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.rentals (id, landlord_id, property_id, tenant_id, monthly_rent, lease_start_date, lease_end_date, security_deposit, status, terms, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 5101 (class 0 OID 629406)
-- Dependencies: 251
-- Data for Name: services; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.services (id, name, slug, description, icon, image, category, price, price_type, contact_name, contact_phone, contact_email, features, is_active, display_order, created_at, updated_at) FROM stdin;
1	Quis esse sapiente 	quis-esse-sapiente	Fuga Ad ab beatae i	\N	\N	Ad at ut in soluta	66.00	negotiable	Laboris perferendis 	Provident velit co	tomyqo@mailinator.com	Exercitationem volup	t	0	2025-10-19 17:08:43	2025-10-19 17:08:43
\.


--
-- TOC entry 5103 (class 0 OID 629415)
-- Dependencies: 253
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sessions (id, user_id, ip_address, user_agent, payload, last_activity) FROM stdin;
7bixOYi1kKgaVrVOTG9pdrC9XHLJ4Xu0IUGmU8IL	8	127.0.0.1	Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36	YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWUhJWjFZQzFhTU5qR1hjb1hhbkJRNHZOcDdBZExwdG9Xb2lLWVNOcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjg7fQ==	1761125110
\.


--
-- TOC entry 5104 (class 0 OID 629420)
-- Dependencies: 254
-- Data for Name: support_messages; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.support_messages (id, ticket_id, user_id, message, attachment, is_admin, read_at, created_at, updated_at) FROM stdin;
1	1	4	Qui aut hic non corp	\N	f	\N	2025-10-19 15:15:55	2025-10-19 15:15:55
\.


--
-- TOC entry 5106 (class 0 OID 629427)
-- Dependencies: 256
-- Data for Name: support_tickets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.support_tickets (id, user_id, ticket_number, subject, category, priority, status, assigned_to, last_reply_at, closed_at, created_at, updated_at) FROM stdin;
1	4	TKT-20251019-3F5DB9	Quibusdam voluptas a	other	urgent	open	\N	2025-10-19 15:15:55	\N	2025-10-19 15:15:55	2025-10-19 15:15:55
\.


--
-- TOC entry 5108 (class 0 OID 629436)
-- Dependencies: 258
-- Data for Name: tenants; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tenants (id, user_id, property_id, rental_application_id, lease_start, lease_end, rent_amount, payment_status, status, emergency_contact, notes, created_at, updated_at) FROM stdin;
1	4	23	2	2025-10-25	2026-10-25	307432.00	paid	active	\N	\N	2025-10-19 12:22:52	2025-10-19 12:29:29
\.


--
-- TOC entry 5110 (class 0 OID 629444)
-- Dependencies: 260
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, name, email, email_verified_at, password, remember_token, current_team_id, profile_photo_path, created_at, updated_at, two_factor_secret, two_factor_recovery_codes, two_factor_confirmed_at, user_type, business_type, nida_document, passport_document, business_license, certificate_of_incorporation, tax_clearance_certificate, memorandum_of_association, articles_of_association, board_resolution, proof_of_address, bank_statement, kyc_status, kyc_notes) FROM stdin;
1	Sarah Property Seller	seller@example.com	\N	$2y$12$L/nl27e7SwkCCjPT8D.J9.Fdk8gaHkNwMzjtJFVyVYyLokDgKkyxG	\N	\N	\N	2025-10-17 12:03:47	2025-10-17 12:03:47	\N	\N	\N	seller	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending	\N
2	Mike Materials Supplier	supplier@example.com	\N	$2y$12$l/pIOySTdBYQ9dsW3EFGo.5QHAKLQ4YGprKLAAuYL.jmgOt9vB1Je	\N	\N	\N	2025-10-17 12:03:47	2025-10-17 12:03:47	\N	\N	\N	supplier	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending	\N
3	Lisa Property Landlord	landlord@example.com	\N	$2y$12$TGwtSOncocT08pcm0dsauO8Mda.8QK3RwZZ3OMMAl0kOIXOr1g1Hq	\N	\N	\N	2025-10-17 12:03:47	2025-10-17 12:03:47	\N	\N	\N	landlord	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending	\N
4	Savanna System Manager	savanna@example.com	2025-10-17 12:08:36	$2y$12$28b7UKQT4dTxs11a1FcdO.SW4QQJyyjhsRQFevPDlKWtkKrR4tfE6	\N	\N	\N	2025-10-17 12:03:47	2025-10-19 14:53:59	\N	\N	\N	savanna	\N	kyc-documents/ZFiN4LMnhbNufBauIFFyMmJlSe2qCuRGwE9EvDOb.jpg	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending	\N
5	Roary Willis	nibygykini@mailinator.com	\N	$2y$12$QUzQ8CMvHHlWssxG/MTcBe0cZm07JXEQ5LEFpZYbdrMOUoc3O32I6	\N	\N	\N	2025-10-20 07:24:12	2025-10-20 07:24:12	\N	\N	\N	supplier	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending	\N
7	Andrew Mashamba	andrew.s.mashamba@gmail.com	\N	$2y$12$XuE.aKRiJt0HA/ImKzLeB.T8pG8opRMzwHdFL.19bEQ9Bj80AY0Gu	\N	\N	\N	2025-10-22 11:25:01	2025-10-22 08:25:43	\N	\N	\N	savanna	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending	\N
8	Grace Hendrix	kulebepuc@mailinator.com	\N	$2y$12$K2BPAGvPBI5ooi9YEubkzOqijJdu.tgImpoINgg6eYpf9wfXIBrde	\N	\N	\N	2025-10-22 08:42:00	2025-10-22 08:42:00	\N	\N	\N	agent	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	pending	\N
\.


--
-- TOC entry 5138 (class 0 OID 0)
-- Dependencies: 218
-- Name: banks_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.banks_id_seq', 10, true);


--
-- TOC entry 5139 (class 0 OID 0)
-- Dependencies: 222
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- TOC entry 5140 (class 0 OID 0)
-- Dependencies: 224
-- Name: financing_inquiries_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.financing_inquiries_id_seq', 2, true);


--
-- TOC entry 5141 (class 0 OID 0)
-- Dependencies: 226
-- Name: inquiries_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.inquiries_id_seq', 6, true);


--
-- TOC entry 5142 (class 0 OID 0)
-- Dependencies: 229
-- Name: jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.jobs_id_seq', 1, false);


--
-- TOC entry 5143 (class 0 OID 0)
-- Dependencies: 231
-- Name: loan_products_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.loan_products_id_seq', 10, true);


--
-- TOC entry 5144 (class 0 OID 0)
-- Dependencies: 233
-- Name: materials_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.materials_id_seq', 11, true);


--
-- TOC entry 5145 (class 0 OID 0)
-- Dependencies: 235
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 44, true);


--
-- TOC entry 5146 (class 0 OID 0)
-- Dependencies: 237
-- Name: order_items_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.order_items_id_seq', 8, true);


--
-- TOC entry 5147 (class 0 OID 0)
-- Dependencies: 239
-- Name: orders_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.orders_id_seq', 5, true);


--
-- TOC entry 5148 (class 0 OID 0)
-- Dependencies: 242
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);


--
-- TOC entry 5149 (class 0 OID 0)
-- Dependencies: 244
-- Name: properties_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.properties_id_seq', 25, true);


--
-- TOC entry 5150 (class 0 OID 0)
-- Dependencies: 246
-- Name: property_images_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.property_images_id_seq', 33, true);


--
-- TOC entry 5151 (class 0 OID 0)
-- Dependencies: 248
-- Name: rental_applications_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.rental_applications_id_seq', 2, true);


--
-- TOC entry 5152 (class 0 OID 0)
-- Dependencies: 250
-- Name: rentals_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.rentals_id_seq', 1, false);


--
-- TOC entry 5153 (class 0 OID 0)
-- Dependencies: 252
-- Name: services_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.services_id_seq', 1, true);


--
-- TOC entry 5154 (class 0 OID 0)
-- Dependencies: 255
-- Name: support_messages_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.support_messages_id_seq', 1, true);


--
-- TOC entry 5155 (class 0 OID 0)
-- Dependencies: 257
-- Name: support_tickets_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.support_tickets_id_seq', 1, true);


--
-- TOC entry 5156 (class 0 OID 0)
-- Dependencies: 259
-- Name: tenants_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tenants_id_seq', 1, true);


--
-- TOC entry 5157 (class 0 OID 0)
-- Dependencies: 261
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 8, true);


--
-- TOC entry 4818 (class 2606 OID 629474)
-- Name: banks banks_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.banks
    ADD CONSTRAINT banks_pkey PRIMARY KEY (id);


--
-- TOC entry 4822 (class 2606 OID 629476)
-- Name: cache_locks cache_locks_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cache_locks
    ADD CONSTRAINT cache_locks_pkey PRIMARY KEY (key);


--
-- TOC entry 4820 (class 2606 OID 629478)
-- Name: cache cache_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cache
    ADD CONSTRAINT cache_pkey PRIMARY KEY (key);


--
-- TOC entry 4824 (class 2606 OID 629480)
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 4826 (class 2606 OID 629482)
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- TOC entry 4828 (class 2606 OID 629484)
-- Name: financing_inquiries financing_inquiries_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.financing_inquiries
    ADD CONSTRAINT financing_inquiries_pkey PRIMARY KEY (id);


--
-- TOC entry 4831 (class 2606 OID 629486)
-- Name: inquiries inquiries_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.inquiries
    ADD CONSTRAINT inquiries_pkey PRIMARY KEY (id);


--
-- TOC entry 4835 (class 2606 OID 629488)
-- Name: job_batches job_batches_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_batches
    ADD CONSTRAINT job_batches_pkey PRIMARY KEY (id);


--
-- TOC entry 4837 (class 2606 OID 629490)
-- Name: jobs jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 4840 (class 2606 OID 629492)
-- Name: loan_products loan_products_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.loan_products
    ADD CONSTRAINT loan_products_pkey PRIMARY KEY (id);


--
-- TOC entry 4842 (class 2606 OID 629494)
-- Name: materials materials_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.materials
    ADD CONSTRAINT materials_pkey PRIMARY KEY (id);


--
-- TOC entry 4844 (class 2606 OID 629496)
-- Name: materials materials_sku_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.materials
    ADD CONSTRAINT materials_sku_unique UNIQUE (sku);


--
-- TOC entry 4846 (class 2606 OID 629498)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 4850 (class 2606 OID 629500)
-- Name: order_items order_items_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_items
    ADD CONSTRAINT order_items_pkey PRIMARY KEY (id);


--
-- TOC entry 4855 (class 2606 OID 629502)
-- Name: orders orders_order_number_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_order_number_unique UNIQUE (order_number);


--
-- TOC entry 4857 (class 2606 OID 629504)
-- Name: orders orders_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_pkey PRIMARY KEY (id);


--
-- TOC entry 4859 (class 2606 OID 629506)
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- TOC entry 4862 (class 2606 OID 629508)
-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);


--
-- TOC entry 4864 (class 2606 OID 629510)
-- Name: personal_access_tokens personal_access_tokens_token_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);


--
-- TOC entry 4867 (class 2606 OID 629512)
-- Name: properties properties_mls_id_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.properties
    ADD CONSTRAINT properties_mls_id_unique UNIQUE (mls_id);


--
-- TOC entry 4869 (class 2606 OID 629514)
-- Name: properties properties_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.properties
    ADD CONSTRAINT properties_pkey PRIMARY KEY (id);


--
-- TOC entry 4871 (class 2606 OID 629516)
-- Name: property_images property_images_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.property_images
    ADD CONSTRAINT property_images_pkey PRIMARY KEY (id);


--
-- TOC entry 4873 (class 2606 OID 629518)
-- Name: rental_applications rental_applications_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rental_applications
    ADD CONSTRAINT rental_applications_pkey PRIMARY KEY (id);


--
-- TOC entry 4875 (class 2606 OID 629520)
-- Name: rentals rentals_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rentals
    ADD CONSTRAINT rentals_pkey PRIMARY KEY (id);


--
-- TOC entry 4877 (class 2606 OID 629522)
-- Name: services services_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.services
    ADD CONSTRAINT services_pkey PRIMARY KEY (id);


--
-- TOC entry 4879 (class 2606 OID 629524)
-- Name: services services_slug_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.services
    ADD CONSTRAINT services_slug_unique UNIQUE (slug);


--
-- TOC entry 4882 (class 2606 OID 629526)
-- Name: sessions sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);


--
-- TOC entry 4885 (class 2606 OID 629528)
-- Name: support_messages support_messages_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.support_messages
    ADD CONSTRAINT support_messages_pkey PRIMARY KEY (id);


--
-- TOC entry 4887 (class 2606 OID 629530)
-- Name: support_tickets support_tickets_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.support_tickets
    ADD CONSTRAINT support_tickets_pkey PRIMARY KEY (id);


--
-- TOC entry 4889 (class 2606 OID 629532)
-- Name: support_tickets support_tickets_ticket_number_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.support_tickets
    ADD CONSTRAINT support_tickets_ticket_number_unique UNIQUE (ticket_number);


--
-- TOC entry 4891 (class 2606 OID 629534)
-- Name: tenants tenants_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tenants
    ADD CONSTRAINT tenants_pkey PRIMARY KEY (id);


--
-- TOC entry 4893 (class 2606 OID 629536)
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 4895 (class 2606 OID 629538)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 4829 (class 1259 OID 629539)
-- Name: inquiries_created_at_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX inquiries_created_at_index ON public.inquiries USING btree (created_at);


--
-- TOC entry 4832 (class 1259 OID 629540)
-- Name: inquiries_property_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX inquiries_property_id_index ON public.inquiries USING btree (property_id);


--
-- TOC entry 4833 (class 1259 OID 629541)
-- Name: inquiries_to_user_id_status_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX inquiries_to_user_id_status_index ON public.inquiries USING btree (to_user_id, status);


--
-- TOC entry 4838 (class 1259 OID 629542)
-- Name: jobs_queue_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX jobs_queue_index ON public.jobs USING btree (queue);


--
-- TOC entry 4847 (class 1259 OID 629543)
-- Name: order_items_material_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX order_items_material_id_index ON public.order_items USING btree (material_id);


--
-- TOC entry 4848 (class 1259 OID 629544)
-- Name: order_items_order_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX order_items_order_id_index ON public.order_items USING btree (order_id);


--
-- TOC entry 4851 (class 1259 OID 629545)
-- Name: orders_buyer_id_status_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX orders_buyer_id_status_index ON public.orders USING btree (buyer_id, status);


--
-- TOC entry 4852 (class 1259 OID 629546)
-- Name: orders_created_at_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX orders_created_at_index ON public.orders USING btree (created_at);


--
-- TOC entry 4853 (class 1259 OID 629547)
-- Name: orders_order_number_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX orders_order_number_index ON public.orders USING btree (order_number);


--
-- TOC entry 4860 (class 1259 OID 629548)
-- Name: personal_access_tokens_expires_at_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX personal_access_tokens_expires_at_index ON public.personal_access_tokens USING btree (expires_at);


--
-- TOC entry 4865 (class 1259 OID 629549)
-- Name: personal_access_tokens_tokenable_type_tokenable_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);


--
-- TOC entry 4880 (class 1259 OID 629550)
-- Name: sessions_last_activity_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);


--
-- TOC entry 4883 (class 1259 OID 629551)
-- Name: sessions_user_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);


--
-- TOC entry 4896 (class 2606 OID 629552)
-- Name: financing_inquiries financing_inquiries_loan_product_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.financing_inquiries
    ADD CONSTRAINT financing_inquiries_loan_product_id_foreign FOREIGN KEY (loan_product_id) REFERENCES public.loan_products(id) ON DELETE CASCADE;


--
-- TOC entry 4897 (class 2606 OID 629557)
-- Name: financing_inquiries financing_inquiries_property_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.financing_inquiries
    ADD CONSTRAINT financing_inquiries_property_id_foreign FOREIGN KEY (property_id) REFERENCES public.properties(id) ON DELETE CASCADE;


--
-- TOC entry 4898 (class 2606 OID 629562)
-- Name: financing_inquiries financing_inquiries_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.financing_inquiries
    ADD CONSTRAINT financing_inquiries_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- TOC entry 4899 (class 2606 OID 629567)
-- Name: inquiries inquiries_from_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.inquiries
    ADD CONSTRAINT inquiries_from_user_id_foreign FOREIGN KEY (from_user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- TOC entry 4900 (class 2606 OID 629572)
-- Name: inquiries inquiries_property_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.inquiries
    ADD CONSTRAINT inquiries_property_id_foreign FOREIGN KEY (property_id) REFERENCES public.properties(id) ON DELETE CASCADE;


--
-- TOC entry 4901 (class 2606 OID 629577)
-- Name: inquiries inquiries_to_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.inquiries
    ADD CONSTRAINT inquiries_to_user_id_foreign FOREIGN KEY (to_user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- TOC entry 4902 (class 2606 OID 629582)
-- Name: loan_products loan_products_bank_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.loan_products
    ADD CONSTRAINT loan_products_bank_id_foreign FOREIGN KEY (bank_id) REFERENCES public.banks(id) ON DELETE CASCADE;


--
-- TOC entry 4903 (class 2606 OID 629587)
-- Name: order_items order_items_material_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_items
    ADD CONSTRAINT order_items_material_id_foreign FOREIGN KEY (material_id) REFERENCES public.materials(id) ON DELETE SET NULL;


--
-- TOC entry 4904 (class 2606 OID 629592)
-- Name: order_items order_items_order_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_items
    ADD CONSTRAINT order_items_order_id_foreign FOREIGN KEY (order_id) REFERENCES public.orders(id) ON DELETE CASCADE;


--
-- TOC entry 4905 (class 2606 OID 629597)
-- Name: orders orders_buyer_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_buyer_id_foreign FOREIGN KEY (buyer_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- TOC entry 4906 (class 2606 OID 629602)
-- Name: orders orders_supplier_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_supplier_id_foreign FOREIGN KEY (supplier_id) REFERENCES public.users(id) ON DELETE SET NULL;


--
-- TOC entry 4907 (class 2606 OID 629607)
-- Name: properties properties_agent_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.properties
    ADD CONSTRAINT properties_agent_id_foreign FOREIGN KEY (agent_id) REFERENCES public.users(id) ON DELETE SET NULL;


--
-- TOC entry 4908 (class 2606 OID 629612)
-- Name: properties properties_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.properties
    ADD CONSTRAINT properties_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- TOC entry 4909 (class 2606 OID 629617)
-- Name: property_images property_images_property_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.property_images
    ADD CONSTRAINT property_images_property_id_foreign FOREIGN KEY (property_id) REFERENCES public.properties(id) ON DELETE CASCADE;


--
-- TOC entry 4910 (class 2606 OID 629622)
-- Name: rental_applications rental_applications_property_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rental_applications
    ADD CONSTRAINT rental_applications_property_id_foreign FOREIGN KEY (property_id) REFERENCES public.properties(id) ON DELETE CASCADE;


--
-- TOC entry 4911 (class 2606 OID 629627)
-- Name: rental_applications rental_applications_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rental_applications
    ADD CONSTRAINT rental_applications_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- TOC entry 4912 (class 2606 OID 629632)
-- Name: rentals rentals_landlord_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rentals
    ADD CONSTRAINT rentals_landlord_id_foreign FOREIGN KEY (landlord_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- TOC entry 4913 (class 2606 OID 629637)
-- Name: rentals rentals_property_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rentals
    ADD CONSTRAINT rentals_property_id_foreign FOREIGN KEY (property_id) REFERENCES public.properties(id) ON DELETE CASCADE;


--
-- TOC entry 4914 (class 2606 OID 629642)
-- Name: rentals rentals_tenant_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rentals
    ADD CONSTRAINT rentals_tenant_id_foreign FOREIGN KEY (tenant_id) REFERENCES public.users(id) ON DELETE SET NULL;


--
-- TOC entry 4915 (class 2606 OID 629647)
-- Name: support_messages support_messages_ticket_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.support_messages
    ADD CONSTRAINT support_messages_ticket_id_foreign FOREIGN KEY (ticket_id) REFERENCES public.support_tickets(id) ON DELETE CASCADE;


--
-- TOC entry 4916 (class 2606 OID 629652)
-- Name: support_messages support_messages_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.support_messages
    ADD CONSTRAINT support_messages_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- TOC entry 4917 (class 2606 OID 629657)
-- Name: support_tickets support_tickets_assigned_to_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.support_tickets
    ADD CONSTRAINT support_tickets_assigned_to_foreign FOREIGN KEY (assigned_to) REFERENCES public.users(id) ON DELETE SET NULL;


--
-- TOC entry 4918 (class 2606 OID 629662)
-- Name: support_tickets support_tickets_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.support_tickets
    ADD CONSTRAINT support_tickets_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- TOC entry 4919 (class 2606 OID 629667)
-- Name: tenants tenants_property_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tenants
    ADD CONSTRAINT tenants_property_id_foreign FOREIGN KEY (property_id) REFERENCES public.properties(id) ON DELETE CASCADE;


--
-- TOC entry 4920 (class 2606 OID 629672)
-- Name: tenants tenants_rental_application_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tenants
    ADD CONSTRAINT tenants_rental_application_id_foreign FOREIGN KEY (rental_application_id) REFERENCES public.rental_applications(id) ON DELETE SET NULL;


--
-- TOC entry 4921 (class 2606 OID 629677)
-- Name: tenants tenants_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tenants
    ADD CONSTRAINT tenants_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- TOC entry 5117 (class 0 OID 0)
-- Dependencies: 5
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: pg_database_owner
--

REVOKE USAGE ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2025-11-24 14:23:16

--
-- PostgreSQL database dump complete
--

