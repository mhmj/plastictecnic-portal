<template>
    <div>
        <ScalingSquaresSpinner
                :animation-duration="1250"
                :size="50"
                color="#f96332"
        />
    </div>
</template>

<script>
    // To use minified css and js files instead of .vue single file components:
    // import 'epic-spinners/dist/lib/epic-spinners.min.css'
    // import {AtomSpinner} from 'epic-spinners/dist/lib/epic-spinners.min.js'

    import {ScalingSquaresSpinner} from 'epic-spinners'
    export default {
        components: {
            ScalingSquaresSpinner
        }
    }
</script>