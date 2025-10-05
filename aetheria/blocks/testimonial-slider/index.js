/**
 * Block Editor Script
 */
import { registerBlockType } from '@wordpress/blocks';
import metadata from './block.json';

registerBlockType( metadata.name, {
edit: () => {
return <div>Block Editor Placeholder</div>;
},
save: () => {
return null; // Dynamic block
}
} );
