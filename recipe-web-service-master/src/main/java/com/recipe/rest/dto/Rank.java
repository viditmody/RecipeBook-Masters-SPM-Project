/*************************************************************************
 * Copyright (c) Metabiota Incorporated - All Rights Reserved
 * ------------------------------------------------------------------------
 * This material is proprietary to Metabiota Incorporated. The
 * intellectual and technical concepts contained herein are proprietary
 * to Metabiota Incorporated. Reproduction or distribution of this
 * material, in whole or in part, is strictly forbidden unless prior
 * written permission is obtained from Metabiota Incorporated.
 * ***********************************************************************
 * <p/>
 * Created by WLao on 11/11/15.
 */
package com.recipe.rest.dto;

import com.fasterxml.jackson.annotation.JsonIgnoreProperties;
import com.fasterxml.jackson.annotation.JsonInclude;
import com.fasterxml.jackson.annotation.JsonRootName;
import com.fasterxml.jackson.annotation.JsonView;
import com.recipe.rest.common.View;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;
import lombok.ToString;
import org.springframework.stereotype.Component;

import java.util.Date;

@ToString
@Component
@Data
@NoArgsConstructor
@AllArgsConstructor
@JsonInclude(JsonInclude.Include.NON_NULL)
@JsonRootName("rank")
@JsonIgnoreProperties(ignoreUnknown = true)
public class Rank {
    @JsonView({View.GetResponse.class, View.PostResponse.class})
    private Integer id;

    @JsonView({View.GetResponse.class})
    private Integer rank;

    @JsonView({View.GetResponse.class})
    private Integer recipeId;

    @JsonView({View.GetResponse.class})
    private Integer userId;

    @JsonView({View.GetResponse.class})
    private String status;

    @JsonView(View.GetResponse.class)
    private String createdBy;

    @JsonView(View.GetResponse.class)
    private Date createdDate;

    @JsonView(View.GetResponse.class)
    private String updatedBy;

    @JsonView(View.GetResponse.class)
    private Date updatedDate;
}
