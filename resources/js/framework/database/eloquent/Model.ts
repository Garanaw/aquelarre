import {
    forOwn,
    clone,
    cloneDeep,
    map,
    forEach
} from 'lodash';
import Collection from 'collect.js';
import dayjs from 'dayjs';
import BuilderContract from '../../contracts/database/eloquent/Builder';
import Builder from './Builder';
import ModelException from './domain/Exception/ModelException';
import makeNullModel from './domain/MakeNullModel';
import {
    AnyObject
} from '../../types';
//import Route from 'http/Route';

export default abstract class Model<T>
{
    protected type!: string | null;

    protected links: AnyObject = {};

    protected builder: BuilderContract | null = null;

    protected $attributes: AnyObject = {};

    protected $original: AnyObject = {};

    constructor(attributes = {}) {
        this.type = this.resourceName();
        this.links = {};
        //this.setBaseUrl();
        //this._initProperties();
        //this.setProperties = new Collection([]);
        this.syncOriginal();
        this.fill(attributes);
    }

    public syncOriginal(): T
    {
        this.$original = this.getAttributes();
        // @ts-ignore
        return this;
    }

    public getAttributes(): AnyObject
    {
        return this.$attributes;
    }

    // _initProperties() {
    //     // @ts-ignore
    //     this.fields().forEach(field => this[field] = null);
    // }

    getBuilder(): BuilderContract {
        return this.builder = new Builder();
    }

    // getFormatter() {
    //     return new Formatter();
    // }

    static instance (data = {}) {
        // @ts-ignore
        return new this(data);
    }

    // override model properties

    fields(): Array<string> {
        return [];
    }

    dates() {
        return [];
    }

    relationships () {
        return {};
    }

    computed () {
        return {};
    }

    morphs () {
        return {};
    }

    resourceName(): string | null {
        return null;
    }

    static resourceName() {
        return this.instance().resourceName();
    }

    /**
     * @return {int|null}
     */
    getId() {
        // @ts-ignore
        let id = this.id;
        return id ? parseInt(id) : null;
    }

    /**
     * @var {int} id
     * @return {this}
     */
    setId(id): this {
        // @ts-ignore
        this.id = parseInt(id);
        return this;
    }

    getType(): string | null {
        return this.type;
    }

    isType(type) {
        return this.type === type;
    }

    isSameType(model) {
        return this.type === model.type;
    }

    /**
     * @var {string} type
     * @return this
     */
    setType(type) {
        this.type = type;
        return this;
    }

    /**
     * return {string}
     */
    // getResource() {
    //     return ucfirst(this.resourceName());
    // }

    isDefined(property): boolean {
        return this[property] !== null && typeof this[property] !== 'undefined';
    }

    hasId(property): boolean {
        let o = this[property];
        return typeof o['getId'] === 'function' && o.getId() !== 'undefined' && o.getId() !== null;
    }

    /**
     * @param {int} id
     * @returns {boolean}
     */
    isId(id): boolean {
        // @ts-ignore
        return this.hasValidId() && this.id === id;
    }

    is(model) {
        return this.isId(model.getId()) && this.isType(model.getType());
    }

    hasValidId(): boolean {
        // @ts-ignore
        return 'id' in this && this.id !== null;
    }

    // /**
    //  * @return {boolean}
    //  */
    // propertyIsSet(property) {
    //     if (this.setProperties.has(property)) {
    //         return this.setProperties.get(property);
    //     }
    //     let result = this.isDefined(property) && this.hasId(property);
    //     this.setProperties.push(property, result);
    //     return result;
    // }

    // override model hooks

    preFetch(config) {
        return config;
    }

    postFetch(response) {
        return response;
    }

    // async request(config) {
    //     return axios.request(config);
    // }
    //
    // // fetch requests
    //
    // async makeFetchRequest (url) {
    //     let requestConfig = {
    //         method: 'GET',
    //         url,
    //         headers: {
    //             'Accept': 'application/vnd.api+json'
    //         }
    //     };
    //     this.builder.reset();
    //     requestConfig = this.preFetch(requestConfig);
    //     let response = await this.request(requestConfig);
    //
    //     response = this.postFetch(response);
    //     return this.respond(response.data);
    // }

    // get () {
    //     return this.makeFetchRequest(`${this.resourceUrl()}${this.builder.getQuery()}`);
    // }

    // static get() {
    //     let self = this.instance();
    //     return self.get();
    // }
    //
    // all () {
    //     return this.get();
    // }
    //
    // static all() {
    //     let self = this.instance();
    //     return self.all();
    // }

    // find (id) {
    //     return this.makeFetchRequest(`${this.resourceUrl()}${id}${this.builder.getQuery()}`);
    // }

    // static find(id) {
    //     let self = this.instance();
    //     return self.find(id);
    // }

    // paginate (perPage = 10, page = 1) {
    //     this.builder.paginate(perPage, page);
    //
    //     return this.makeFetchRequest(`${this.resourceUrl()}${this.builder.getQuery()}`);
    // }

    async fetchRelation (relationship, links: AnyObject = {}) {
        if (links.self === undefined) {
            links.self = this.getRelationshipUrl(relationship);
        }

        this[relationship] = await this.relationships()[relationship].makeFetchRequest(links.self);

        return this[relationship];
    }

    // persist requests

    // async makePersistRequest (config) {
    //     config.headers = {
    //         'Content-Type': 'application/vnd.api+json',
    //         'Accept': 'application/vnd.api+json'
    //     };
    //
    //     let response = await this.request(config);
    //
    //     return this.respond(response.data);
    // }

    // save () {
    //     if (this.hasOwnProperty('id')) {
    //         return this.update();
    //     }
    //
    //     return this.create();
    // }

    // create () {
    //     return this.makePersistRequest({
    //         url: this.resourceUrl(),
    //         method: 'POST',
    //         data: this.serialize(this.data())
    //     });
    // }
    //
    // update () {
    //     return this.makePersistRequest({
    //         url: this.getSelfUrl(),
    //         method: 'PATCH',
    //         data: this.serialize(this.data())
    //     });
    // }
    //
    // delete () {
    //     return this.makePersistRequest({
    //         url: this.getSelfUrl(),
    //         method: 'DELETE'
    //     });
    // }
    //
    // attach (model, data = null) {
    //     let config: RequestConfig = {
    //         url: `${this.getSelfUrl()}/${model.type}/${model.id}`,
    //         method: 'POST'
    //     };
    //
    //     if (data) {
    //         config.data = data
    //     }
    //
    //     return this.makePersistRequest(config);
    // }
    //
    // detach (model) {
    //     return this.makePersistRequest({
    //         url: `${this.getSelfUrl()}/${model.type}/${model.id}`,
    //         method: 'DELETE'
    //     });
    // }
    //
    // sync (relationship) {
    //     const data = this.serialize(this.data());
    //
    //     return this.makePersistRequest({
    //         url: `${this.getSelfUrl()}/${relationship}`,
    //         method: 'PATCH',
    //         data: data.data.relationships[relationship]
    //     });
    // }

    // modify query string

    // with (resourceName) {
    //     this.builder.include(resourceName);
    //
    //     return this;
    // }
    //
    // static with(resourceName) {
    //     let self = this.instance();
    //     self.with(resourceName);
    //
    //     return self;
    // }

    // include(resourceName) {
    //     return this.with(resourceName);
    // }
    //
    // static include(resourceName) {
    //     let self = this.instance();
    //     self.with(resourceName);
    //
    //     return self;
    // }

    // where (key, value = null, group = null) {
    //     this.builder.where(key, value, group);
    //
    //     return this;
    // }

    // static where(key, value = null, group = null) {
    //     let self = this.instance();
    //     self.where(key, value, group);
    //
    //     return self;
    // }
    //
    // whereIn(key, array) {
    //     let values: any = null;
    //     if (Array.isArray(array)) {
    //         values = array;
    //     } else if (array instanceof Object) {
    //         values = Object.values(array);
    //     }
    //     if (values === null) {
    //         throw "Error: whereIn requires an array or an object, " + typeof array + " passed";
    //     }
    //
    //     for (let i in values) {
    //         this.where(key, values[i]);
    //     }
    //
    //     return this;
    // }
    //
    // static whereIn(field, array) {
    //     let self = this.instance();
    //     self.whereIn(field, array);
    //
    //     return self;
    // }

    // orderBy (column, direction = 'asc') {
    //     this.builder.orderBy(column, direction);
    //
    //     return this;
    // }

    // static orderBy(column, direction = 'asc') {
    //     let self = this.instance();
    //     self.orderBy(column, direction);
    //
    //     return self;
    // }
    //
    // orderByDesc (column) {
    //     return this.orderBy(column, 'desc');
    // }
    //
    // static orderByDesc(column) {
    //     let self = this.instance();
    //     self.orderBy(column, 'desc');
    //
    //     return self;
    // }
    //
    // filter (filter, group = null) {
    //     return this.where(filter, null, group);
    // }
    //
    // static filter(filter, group = null) {
    //     let self = this.instance();
    //     self.filter(filter, group);
    //
    //     return self;
    // }
    //
    // limit (limit) {
    //     return this.where('limit', limit);
    // }
    //
    // static limit(value) {
    //     let self = this.instance();
    //     self.limit(value);
    //
    //     return self;
    // }
    //
    // offset (offset) {
    //     return this.where('offset', offset);
    // }

    // select (fields) {
    //     if (Array.isArray(fields)) {
    //         const selectFields = clone(fields);
    //         fields = {};
    //         // @ts-ignore
    //         fields[this.resourceName()] = selectFields;
    //     }
    //
    //     this.builder.select(fields);
    //
    //     return this;
    // }
    //
    // param(index, value) {
    //     this.builder.param(index, value);
    //     return this;
    // }

    // mode(mode) {
    //     this.param('mode', mode);
    //     return this;
    // }
    //
    // static mode(mode) {
    //     let self = this.instance();
    //     self.param('mode', mode);
    //
    //     return self;
    // }
    //
    // static param(index, value) {
    //     let self = this.instance();
    //     self.param(index, value);
    //
    //     return self;
    // }

    // respond (response) {
    //     let data = this.deserialize(response);
    //
    //     if (this.isCollection(data)) {
    //         return this.resolveCollection(data);
    //     }
    //
    //     return this.resolveItem(data);
    // }

    resolveCollection (data) {
        let resolved: AnyObject = {};
        resolved = this._setLinks(data, resolved);
        resolved = this._setMeta(data, resolved);

        resolved.data = this.newCollection(map(data.data, item => {
            return this.resolveItem(item);
        }))

        return resolved;
    }

    static resolveCollection(data) {
        let self = this.instance();
        return self.resolveCollection(data);
    }

    resolveItem (data) {
        return data instanceof Model ? data : this.hydrate(data);
    }

    fill(attributes = {}) {
        if (Object.keys(attributes).length === 0) {
            return;
        }

        for (const [key, value] of Object.entries(attributes)) {
            this.setAttribute(key, value);
        }
    }

    public getAttribute(name) {
        return this.$attributes[name];
    }

    public setAttribute(key, value) {
        if (this.hasSetMutator(key)) {
            return this.setMutatedAttributeValue(key, value);
        }

        this.$attributes[key] = value;
    }

    hasSetMutator(key) {
        const method = 'set' + key.charAt(0).toUpperCase() + key.slice(1) + 'Attribute';
        return typeof this[method] === 'function';
    }

    setMutatedAttributeValue(key, value) {
        const method = 'set' + key.charAt(0).toUpperCase() + key.slice(1) + 'Attribute';
        this[method](value);
    }

    hydrate (data) {
        let model = clone(this);

        model.setId(data.id);
        model.setType(data.type);

        model = this._setRelationships(data, model);
        model = this._setLinks(data, model);

        let fields = model.isNull() ? this.extractFieldsFromData(data) :  model.fields();
        forEach(fields, field => {
            model[field] = data[field];
        })

        forOwn(model.dates(), (format, field) => {
            model[field] = dayjs(data[field]);
        })

        forEach(data.relationships, relationship => {
            let relation = model.relationships()[relationship];

            if (relation === undefined) {
                throw new Error(`Relationship ${relationship} has not been defined in ${model.constructor.name} model.`);
            }

            const fetch = () => {
                return model.fetchRelation(relationship, data[relationship].links);
            }

            if (this.isCollection(data[relationship])) {
                model[relationship] = {
                    ...relation.resolveCollection(data[relationship]),
                    fetch
                };
            } else if (data[relationship].data) {
                let relatedModel = this.resolveModel(model, relation, data);
                model[relationship] = relatedModel.resolveItem(data[relationship].data);
                model[relationship].fetch = fetch;
            }
        })

        forOwn(model.relationships(), (relatedModel, relationshipName) => {
            if (model[relationshipName] === undefined) {
                model[relationshipName] = {
                    fetch: () => {
                        return model.fetchRelation(relationshipName);
                    }
                }
            }
        })

        forOwn(model.computed(), (computation, key) => {
            model[key] = computation(model);
        })

        return model;
    }

    extractFieldsFromData(data) {
        let toRemove = ['id', 'type', 'links', 'relationships', 'meta'];
        let result = {};
        forOwn(data, (value, key) => {
            if (!toRemove.includes(key)) {
                result[key] = value;
            }
        });
        return result;
    }

    static hydrate(data) {
        let self = this.instance();
        return self.hydrate(data);
    }

    _setKey(candidate, target, key: string, property: string | null = null, undef = undefined) {
        if (candidate === undef) {
            return target;
        }
        if (candidate.hasOwnProperty(key)) {
            property = property || key;
            target[property] = candidate[key];
        }
        return target;
    }

    _setRelationships(candidate, target) {
        return this._setKey(candidate, target, 'relationships', 'relationshipNames');
    }

    _setLinks(candidate, target) {
        return this._setKey(candidate, target, 'links');
    }

    _setMeta(candidate, target) {
        return this._setKey(candidate, target, 'meta');
    }

    // make(data) {
    //     if ('data' in data) {
    //         data = data.data;
    //     }
    //     data = this.deserialize(data);
    //     return this.resolveItem(data);
    // }

    // static make(data) {
    //     return this.instance().make(data);
    // }

    // makeCollection(data) {
    //     data = this.deserialize(data);
    //     return this.resolveCollection(data);
    // }

    // static makeCollection(data) {
    //     return this.instance().makeCollection(data);
    // }

    // extract data from model

    data () {
        let data: AnyObject = {};

        data.type = this.type;

        if (this.hasOwnProperty('id')) {
            // @ts-ignore
            data.id = this.id;
        }

        if (this.hasOwnProperty('relationshipNames')) {
            // @ts-ignore
            data.relationships = this.relationshipNames;
        }

        forEach(this.fields(), field => {
            if (this[field] !== undefined) {
                data[field] = this[field];
            }
        })

        forOwn(this.dates(), (format, field) => {
            if (this[field] !== undefined) {
                data[field] = dayjs(this[field]).format(format);
            }
        })

        forEach(this.relationships(), (model, relationship) => {
            if (this[relationship] !== undefined && this[relationship].data !== undefined) {
                if (Array.isArray(this[relationship].data)) {
                    data[relationship] = {
                        data_collection: true,
                        data: map(this[relationship].data, relation => {
                            return relation.data();
                        })
                    }
                } else {
                    data[relationship] = {
                        data: this[relationship].data()
                    }
                }
            }
        })

        return data;
    }

    // helpers

    resourceUrl () {
        // @ts-ignore
        return this.route.get();
    }

    resourceRoute() {
        // @ts-ignore
        return this.route;
    }

    sanitizeUrl(url) {
        return url.endsWith('/') ? url.slice(0, -1) : url;
    }

    baseUrl() {
        // @ts-ignore
        return this.apiprefix;
    }

    removeApiPrefix() {
        // @ts-ignore
        this.route.removePrefix();
        return this;
    }

    setApiPrefix(prefix) {
        // @ts-ignore
        this.route.setPrefix(prefix);
        return this;
    }

    setApiSuffix(suffix) {
        // @ts-ignore
        this.route.setSuffix(suffix);
        return this;
    }

    // setBaseUrl(prefix = null, suffix = null) {
    //     // @ts-ignore
    //     this.route = new Route(this.resourceName(), {
    //         prefix: prefix || '/api',
    //         suffix: suffix
    //     });
    //
    //     return this;
    // }

    setResourceName(resourceName) {
        // @ts-ignore
        this.resource_name = resourceName;
        return this;
    }

    getSelfUrl () {
        if (this.links.hasOwnProperty('self')) {
            return this.links.self;
        }

        if (!this.hasOwnProperty('id')) {
            throw new Error(`Unidentifiable resource exception. ${this.constructor.name} id property is undefined.`);
        }

        // @ts-ignore
        this.links.self = `${this.resourceUrl()}${this.id}`;

        return this.links.self;
    }

    getRelationshipUrl (relationship) {
        return `${this.getSelfUrl()}/relationships/${relationship}`;
    }

    isCollection (data: {data_collection?: boolean, data: any}) {
        return data.hasOwnProperty('data_collection') &&
            data.data_collection === true &&
            Array.isArray(data.data);
    }

    isRelation (name) {
        let availableRelations = Object.keys(this.relationships());
        return availableRelations.includes(name);
    }

    isPolymorphic (model, relation) {
        return relation in model.morphs();
    }

    isNull() {
        return false;
    }

    resolveModel (model, relation, data): Model<T> {
        // We assume that the relation is not polymorphic, therefore return the model
        if (relation instanceof Model) {
            return relation;
        }

        // If the relation is not a model, try to guess the model class from the morphs
        let target = this.getNestedData(data[relation]);
        if (!('type' in target)) {
            throw new ModelException('Cannot resolve model for a non polymorfic relation', 500);
        }
        target = target.type.toLowerCase();
        let options = model.morphs();
        if (!(relation in options)) {
            throw new ModelException('Cannot resolve model for a non polymorfic relation', 500);
        }

        let candidates = Object.values(options[relation]);
        for (const key in candidates) {
            // @ts-ignore
            if (candidates[key].type === target) {
                return candidates[key] as Model<T>;
            }
        }

        // @ts-ignore
        return makeNullModel();
    }

    // deserialize (data) {
    //     return this.getFormatter().deserialize(data);
    // }
    //
    // serialize (data) {
    //     return this.getFormatter().serialize(data);
    // }

    // selfValidate () {
    //     const name = this.resourceName();
    //
    //     if (name === null || !isString(name) || name.length === 0) {
    //         throw new Error(`Resource name not defined in ${this.constructor.name} model. Implement resourceName method in the ${this.constructor.name} model to resolve this error.`);
    //     }
    // }

    clone () {
        return cloneDeep(this);
    }

    newCollection(data): typeof Collection {
        // @ts-ignore
        return new Collection(data);
    }

    static newCollection(data) {
        return this.instance().newCollection(data);
    }

    getNestedData (data) {
        if ('data' in data) {
            return data.data;
        }
        return data;
    }

    internalFields() {
        return [
            'queryBuilder',
            'links',
            'route',
            'setProperties',
        ];
    }

    isInternalField(field) {
        return this.internalFields().includes(field);
    }

    toArray() {
        let data = {
            type: this.type
        };

        if (this.hasOwnProperty('id')) {
            // @ts-ignore
            data.id = this.id;
        }

        this.fields().forEach(field => {
            if (typeof this[field] === 'undefined' || this.isRelation(field) || this.isInternalField(field)) {
                return;
            }
            data[field] = this[field];
        });

        for (let field in this.dates()) {
            if (!(field in this)) {
                continue;
            }
            data[field] = dayjs(this[field]).format(field);
        }

        return data;
    }

    toArrayRecursive() {
        let data = this.toArray();
        let relationshipNames = Object.keys(this.relationships());

        relationshipNames.forEach(relationship => {
            let relation = this[relationship];
            if (!relation) {
                return;
            }
            if (relation instanceof Model) {
                data[relationship] = relation.toArrayRecursive();
                return;
            }
            if (relation instanceof Collection || (relation.items && Array.isArray(relation.items))) {
                data[relationship] = relation.map(item => item.toArrayRecursive()).all();
            }
        });

        return data;
    }
    /** Forward a method call to the given object. */
    protected forwardCallTo($object: any, $method: string, $parameters: any[]): any
    {
        try {
            return $object[$method](...$parameters);
        } catch (e: any) {
            const $pattern = '~^Call to undefined method (?P<class>[^:]+)::(?P<method>[^\(]+)\(\)$~';

            if (!e.getMessage().match($pattern)) {
                throw e;
            }

            throw new ModelException($method);
        }
    }
}
