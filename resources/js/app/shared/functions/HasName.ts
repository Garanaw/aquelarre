type Nameable = {
    name: string;
    setName?(name: string): Nameable;
    getName?(): string;
}

export default function useName(name: string, nameable: Nameable | unknown): void {
    if (!(nameable instanceof Object) || !('name' in nameable)) {
        throw new Error('The nameable object must have a name property.');
    }

    if ('setName' in nameable && typeof nameable.setName === 'function') {
        nameable.setName(name);
        return;
    }

    nameable.name = name;
}
