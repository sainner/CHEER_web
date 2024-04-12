<html>
    <head>
        <link rel="stylesheet" href="http://localhost:3000/styles/style.css" />
    </head>
    <body>
        <article class="outputsBox">
            <h2></h2>
            <div class="journalBox"></div>
        </article>
    </body>
    <script>
        function drawSlashes(classname, stoke_color = "#ffca28", lineCount_index=60){
            const containers = document.querySelectorAll(`.${classname}`);
            containers.forEach(container => {
                const width = container.offsetWidth;
                const height = container.offsetHeight;
                svg = container.appendChild(document.createElementNS("http://www.w3.org/2000/svg", "svg"));
                svg.setAttribute("style", `display: block; width: 100%; height: 100%;`);
                let lineCount = Math.ceil(width / lineCount_index) ;
                let spacing = (height + width) * 1.1 / lineCount;
                let length_projected = height * 1.3;
                let strokeWidth = spacing / 3;
                let offset = strokeWidth / 2;
                
                for(let i = 0; i < lineCount; i++){
                    let line = document.createElementNS("http://www.w3.org/2000/svg", "line");
                    line.setAttribute("x1", String(-offset + i*spacing));
                    line.setAttribute("y1", String(-offset));
                    line.setAttribute("x2", String(-offset + i*spacing - length_projected));
                    line.setAttribute("y2", String(-offset + length_projected));
                    line.setAttribute("stroke", `${stoke_color}`);
                    line.setAttribute("stroke-width", String(strokeWidth));
                    svg.appendChild(line);
                }
            });
        }
        drawSlashes("journalBox");
    </script>
</html>
