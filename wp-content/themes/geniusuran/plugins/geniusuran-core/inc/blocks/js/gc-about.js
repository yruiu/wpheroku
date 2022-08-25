(function (blocks,editor,element){
    let el=element.createElement;
    blocks.registerBlockType('gcab/gc-about',{
        title: "GU About",

        category:'Text',
        attributes:{
            title:{
                type:'string',
                default:'Block Title',
            },
            content:{
                type:'string',
                default:'Hello World',
            },
        },
        edit: function (props){
            return(
                el('div', {className:props.className},
                    el(
                        editor.RichText,
                        {
                            tagName:'h2',
                            className:'gc-about-title',
                            value: props.attributes.title,
                            onChange:function (content){
                                props.setAttribute({title:content})
                            }
                        }

                    )),
                    el(
                        editor.RichText,
                        {
                            tagName:'div',
                            className:'gc-about-text',
                            value: props.attributes.content,
                            onChange:function (content){
                                props.setAttribute({content:content})
                            }
                        }

                    )
            );
        },
        save:function (props){
            return (
                el('div', {className: props.className}),
                    el(editor.RichText.Content, {
                        tagName: 'h2',
                        className: 'gc-about-title',
                        value:props.attributes.title,
                    }),
                    el(editor.RichText.Content, {
                        tagName: 'div',
                        className: 'gc-about-text',
                        value:props.attributes.content,
                    })
            );
        },


    });
})(window.wp.blocks,window.wp.editor,window.wp.element);