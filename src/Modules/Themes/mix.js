var fs = require('fs');

module.exports = {
    mix: function(mix) {
        var rootDir = __dirname + '/../../Themes';

        var dirs = fs.readdirSync( rootDir );

        for (var i=0; i<dirs.length; i++) 
        {
            var file = rootDir + '/' + dirs[i];

            var stat = fs.statSync(file);
            
            if(stat.isDirectory())
            {
                if(fs.existsSync(file + '/mix.js'))
                {                 
                    require(file + '/mix.js').mix( mix );
                }             
            }    
        }
    }
}